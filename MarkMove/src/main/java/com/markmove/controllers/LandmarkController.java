package com.markmove.controllers;

import com.markmove.constants.Messages;
import com.markmove.forms.LandmarkForm;
import com.markmove.models.Landmark;
import com.markmove.models.Picture;
import com.markmove.services.LandmarkService;
import com.markmove.services.PictureService;
import com.markmove.services.SystemNotificationService;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.validation.BindingResult;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestMethod;
import org.springframework.web.bind.annotation.RequestParam;
import org.springframework.web.multipart.MultipartFile;

import javax.validation.Valid;
import java.security.Principal;
import java.util.HashSet;
import java.util.List;
import java.util.Set;

@Controller
public class LandmarkController {
    @Autowired
    private LandmarkService landmarkService;

    @Autowired
    private PictureService pictureService;

    @Autowired
    private SystemNotificationService notificationService;

    @RequestMapping("/landmarks")
    public String landmarks(Model model){
        return "landmarks/landmarks";
    }

    @RequestMapping(value = "/landmarks/manage", method = RequestMethod.GET)
    public String manageLandmarksPage(Model model){
        List<Landmark> allLandmarks = landmarkService.findAll();

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

        Picture landMarkPicture = this.pictureService.create(file, principal.getName(), false);
        Set<Picture> pictureSet = new HashSet<>();
        pictureSet.add(landMarkPicture);
        newLandmark.setPictures(pictureSet);

        landmarkService.create(newLandmark);
        notificationService.addInfoMessage(Messages.LANDMARK_CREATED_OK);

        return "redirect:/landmarks/manage";
    }

    @RequestMapping("/landmarks/view/{id}")
    public String view(@PathVariable("id") Long id, Model model) {
        Landmark landmark = landmarkService.findById(id);

        if (landmark == null) {
            notificationService.addErrorMessage("Cannot find post #" + id);
            return "redirect:/landmarks/manage";
        }

        model.addAttribute("landmark", landmark);

        return "landmarks/view";
    }

    @RequestMapping(value = "/landmarks/edit/{id}", method = RequestMethod.GET)
    public String editPage(@PathVariable("id") Long id, Model model) {
        Landmark landmark = landmarkService.findById(id);

        if (landmark == null) {
            notificationService.addErrorMessage("Cannot find post #" + id);
            return "redirect:/landmarks/manage";
        }

        model.addAttribute("landmark", landmark);

        return "landmarks/edit";
    }

    @RequestMapping(value = "/landmarks/edit/{id}", method = RequestMethod.POST)
    public String edit(@PathVariable("id") Long id, @Valid LandmarkForm landmarkForm, Model model) {
        Landmark landmark = landmarkService.findById(id);

        if (landmark == null) {
            notificationService.addErrorMessage("Cannot find post #" + id);
            return "redirect:/landmarks/manage";
        }

        model.addAttribute("landmark", landmark);

        //TODO: save changes

        return "landmarks/edit";
    }
}
