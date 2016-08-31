package com.markmove.controllers;

import com.markmove.constants.Messages;
import com.markmove.forms.LandmarkForm;
import com.markmove.models.Landmark;
import com.markmove.models.Picture;
import com.markmove.services.LandmarkService;
import com.markmove.services.PictureService;
import com.markmove.services.SystemNotificationService;
import com.markmove.services.user.UserService;
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
import java.util.stream.Collectors;

@Controller
public class LandmarkController {

    private static final int PAGE_SIZE = 2;

    @Autowired
    private LandmarkService landmarkService;

    @Autowired
    private PictureService pictureService;

    @Autowired
    private ResourceLoader resourceLoader;

    @Autowired
    private UserService userService;

    @Autowired
    private SystemNotificationService notificationService;

    @RequestMapping(value = "/landmarks", method = RequestMethod.GET)
    public String landmarks(Model model){
        List<Landmark> landmarks = this.landmarkService.findAll();

        List<Landmark> mostRated = landmarks.stream()
                .sorted(Comparator.comparingDouble((Landmark landmark) -> landmark.getRating())
                        .reversed()
                        .thenComparing(Comparator.comparing((Landmark landmark) -> landmark.getName())))
                .collect(Collectors.toList())
                .subList(0, 5);

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
        model.addAttribute("totalPages", allLandmarks.getTotalPages());
        model.addAttribute("landmarks", allLandmarks);

        return "landmarks/manage";
    }

    @RequestMapping(value = "/landmarks/create", method = RequestMethod.GET)
    public String createLandmarkPage(){
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
    public String view(@PathVariable("id") Long id, Model model) {
        Landmark landmark = landmarkService.findById(id);

        if (landmark == null) {
            notificationService.addErrorMessage("Cannot find post #" + id);
            return "redirect:/landmarks/manage";
        }

        model.addAttribute("landmark", landmark);

        return "landmarks/view";
    }

    @RequestMapping(value = "/landmarks/view/{id}", method = RequestMethod.POST)
    public String rate(@PathVariable("id") Long id, @RequestParam("star") Double star, Model model) {
        Landmark landmark = landmarkService.findById(id);

        if (landmark == null) {
            notificationService.addErrorMessage("Cannot find post #" + id);
            return "redirect:/landmarks/manage";
        }

        double currentRating = (landmark.getRating() + star) / 2; // average value
        landmark.setRating(currentRating);
        this.landmarkService.create(landmark);

        model.addAttribute("landmark", landmark);

        return "landmarks/view";
    }

    @RequestMapping(method = RequestMethod.GET, value = "/images/uploaded_images/{filename:.+}")
    @ResponseBody
    public ResponseEntity<?> getFile(@PathVariable String filename) {
                    // Paths.get Should be Constant or somehow made with variables
        try {
            return ResponseEntity.ok(resourceLoader.getResource("file:" + Paths.get("src/main/resources/public/images/uploaded_images", filename).toString()));
        } catch (Exception e) {
            return ResponseEntity.notFound().build();
        }
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
    public String edit(@PathVariable("id") Long id, @RequestParam("file") MultipartFile file, @Valid LandmarkForm landmarkForm) {
        Landmark landmark = landmarkService.findById(id);

        if (landmark == null) {
            notificationService.addErrorMessage("Cannot find post #" + id);
            return "redirect:/landmarks/manage";
        }

        Picture landmarkPicture = this.pictureService.create(file, landmark);

        this.landmarkService.edit(landmark, landmarkForm, landmarkPicture);

        return "redirect:/landmarks/manage";
    }

    @RequestMapping(value = "/landmarks/delete/{id}", method = RequestMethod.GET)
    public String deletePage(@PathVariable("id") Long id, Model model) {
        Landmark landmark = landmarkService.findById(id);

        if (landmark == null) {
            notificationService.addErrorMessage("Cannot find post #" + id);
            return "redirect:/landmarks/manage";
        }

        model.addAttribute("landmark", landmark);

        return "landmarks/delete";
    }

    @RequestMapping(value = "/landmarks/delete/{id}", method = RequestMethod.POST)
    public String delete(@PathVariable("id") Long id, Model model) {
        Landmark landmark = landmarkService.findById(id);

        if (landmark == null) {
            notificationService.addErrorMessage("Cannot find post #" + id);
            return "redirect:/landmarks/manage";
        }

        model.addAttribute("landmark", landmark);

        landmarkService.deleteById(id);

        notificationService.addInfoMessage("Successfully deleted landmark.");

        return "redirect:/landmarks/manage";
    }
}
