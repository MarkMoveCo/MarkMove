package com.markmove.controllers;

import com.markmove.constants.Messages;
import com.markmove.forms.LandmarkForm;
import com.markmove.models.Landmark;
import com.markmove.models.Picture;
import com.markmove.services.landmark.LandmarkService;
import com.markmove.services.picture.PictureService;
import com.markmove.services.system.SystemNotificationService;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.core.io.ResourceLoader;
import org.springframework.data.domain.Page;
import org.springframework.data.domain.PageRequest;
import org.springframework.data.domain.Pageable;
import org.springframework.http.ResponseEntity;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.validation.BindingResult;
import org.springframework.web.bind.annotation.*;
import org.springframework.web.multipart.MultipartFile;

import javax.validation.Valid;
import java.nio.file.Paths;
import java.security.Principal;
import java.util.*;

@Controller
public class LandmarkController {

    private static final int PAGE_SIZE = 2;

    @Autowired
    private LandmarkService landmarkService;

    @Autowired
    private PictureService pictureService;

    @Autowired
    private SystemNotificationService notificationService;


    @RequestMapping(value = "/landmarks", method = RequestMethod.GET)
    public String landmarks(Model model){
        List<Landmark> mostRated = this.landmarkService.findTop5();

        model.addAttribute("mostRated", mostRated);

        return "landmarks/landmarks";
    }

    @RequestMapping(value = "/landmarks/manage", method = RequestMethod.GET)
    public String manageLandmarksPage(Model model, @RequestParam(value = "page", required = false) Integer pageNumber){
        Pageable pageable = new PageRequest(0, PAGE_SIZE);
        if (pageNumber != null) {
            pageable = new PageRequest(pageNumber - 1, PAGE_SIZE);
        }

        Page<Landmark> allLandmarks = landmarkService.listAllByPage(pageable);

        if (pageNumber == null) {
            model.addAttribute("currentPage", 1);
        }
        else {
            model.addAttribute("currentPage", pageNumber);
        }

        int totalPagesCount = allLandmarks.getTotalPages();
        if (totalPagesCount == 0) {
            totalPagesCount = 1;
        }

        model.addAttribute("totalPages", totalPagesCount);
        model.addAttribute("landmarks", allLandmarks);

        return "landmarks/manage";
    }

    @RequestMapping(value = "/landmarks/create", method = RequestMethod.GET)
    public String createLandmarkPage(LandmarkForm landmarkForm){
        return "landmarks/create";
    }

    @RequestMapping(value = "/landmarks/create", method = RequestMethod.POST)
    public String createLandmark(@Valid LandmarkForm landmarkForm, @RequestParam("file") MultipartFile file, Principal principal, BindingResult bindingResult){
        Landmark newLandmark = new Landmark(landmarkForm.getName(), landmarkForm.getDescription());
        if (landmarkForm.getLocation() != null){
            newLandmark.setLocation(landmarkForm.getLocation());
        }

        this.landmarkService.create(newLandmark);

        Picture landMarkPicture = this.pictureService.create(file, newLandmark);
        Set<Picture> pictureSet = new HashSet<>();
        pictureSet.add(landMarkPicture);
        newLandmark.setPictures(pictureSet);

        this.landmarkService.create(newLandmark);

        notificationService.addInfoMessage(Messages.LANDMARK_CREATED_OK);

        return "redirect:/landmarks/manage";
    }

    @RequestMapping(value = "/landmarks/view/{id}", method = RequestMethod.GET)
    public String viewLandmark(@PathVariable("id") Long id, Model model) {
        Landmark landmark = landmarkService.findById(id);

        if (landmark == null) {
            notificationService.addErrorMessage(String.format(Messages.LANDMARK_NOT_FOUND_ERROR, id));
            return "redirect:/landmarks/manage";
        }

        model.addAttribute("landmark", landmark);

        return "landmarks/view";
    }

    @RequestMapping(value = "/landmarks/view/{id}", method = RequestMethod.POST)
    public String rateLandmark(@PathVariable("id") Long id, @RequestParam("star") Double star, Model model) {
        Landmark landmark = landmarkService.findById(id);

        if (landmark == null) {
            notificationService.addErrorMessage("Cannot find post #" + id);
            return "redirect:/landmarks/manage";
        }

        if (landmark.getRating() != 0) {
            double currentRating = (landmark.getRating() + star) / 2; // average value
            landmark.setRating(currentRating);
        }
        else {
            landmark.setRating(star);
        }

        this.landmarkService.create(landmark);

        model.addAttribute("landmark", landmark);

        this.notificationService.addInfoMessage(String.format(Messages.LANDMARK_RATED_OK, landmark.getName(), star));

        return "landmarks/view";
    }

    @RequestMapping(value = "/landmarks/edit/{id}", method = RequestMethod.GET)
    public String editLandmark(@PathVariable("id") Long id, Model model) {
        Landmark landmark = landmarkService.findById(id);

        if (landmark == null) {
            notificationService.addErrorMessage(String.format(Messages.LANDMARK_NOT_FOUND_ERROR, id));
            return "redirect:/landmarks/manage";
        }

        model.addAttribute("landmark", landmark);

        return "landmarks/edit";
    }

    @RequestMapping(value = "/landmarks/edit/{id}", method = RequestMethod.POST)
    public String editLandmark(@PathVariable("id") Long id, @RequestParam("file") MultipartFile file, @Valid LandmarkForm landmarkForm) {
        Landmark landmark = landmarkService.findById(id);

        if (landmark == null) {
            notificationService.addErrorMessage("Cannot find post #" + id);
            return "redirect:/landmarks/manage";
        }

        Picture landmarkPicture = this.pictureService.create(file, landmark);

        this.landmarkService.edit(landmark, landmarkForm, landmarkPicture);

        this.notificationService.addInfoMessage(String.format(Messages.LANDMARK_EDITED_OK, id));
        return "redirect:/landmarks/manage";
    }

    @RequestMapping(value = "/landmarks/delete/{id}", method = RequestMethod.GET)
    public String deletePage(@PathVariable("id") Long id, Model model) {
        Landmark landmark = landmarkService.findById(id);

        if (landmark == null) {
            notificationService.addErrorMessage(String.format(Messages.LANDMARK_NOT_FOUND_ERROR,id));
            return "redirect:/landmarks/manage";
        }

        model.addAttribute("landmark", landmark);

        return "landmarks/delete";
    }

    @RequestMapping(value = "/landmarks/delete/{id}", method = RequestMethod.POST)
    public String delete(@PathVariable("id") Long id, Model model) {
        Landmark landmark = landmarkService.findById(id);

        if (landmark == null) {
            notificationService.addErrorMessage(String.format(Messages.LANDMARK_NOT_FOUND_ERROR, id));
            return "redirect:/landmarks/manage";
        }

        model.addAttribute("landmark", landmark);

        landmarkService.deleteById(id);

        notificationService.addInfoMessage(Messages.LANDMARK_DELETED_OK);

        return "redirect:/landmarks/manage";
    }
}
