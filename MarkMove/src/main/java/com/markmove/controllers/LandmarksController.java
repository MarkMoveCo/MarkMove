package com.markmove.controllers;

import com.markmove.forms.LandmarkForm;
import com.markmove.models.Landmark;
import com.markmove.services.LandmarkService;
import com.markmove.services.NotificationService;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.validation.BindingResult;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestMethod;

import javax.validation.Valid;

@Controller
public class LandmarksController {
    @Autowired
    private LandmarkService landmarkService;

    @Autowired
    private NotificationService notificationService;

    @RequestMapping("/landmarks")
    public String landmarks(Model model){
        return "landmarks/landmarks";
    }

    @RequestMapping("/landmarks/manage")
    public String manageLandmarksPage(){
        return "landmarks/manage";
    }

    @RequestMapping(value = "/landmarks/create", method = RequestMethod.GET)
    public String createLandmarkPage(LandmarkForm landmarkForm){
        return "landmarks/create";
    }

    @RequestMapping(value = "/landmarks/create", method = RequestMethod.POST)
    public String createLandmark(@Valid LandmarkForm landmarkForm, BindingResult bindingResult){
        Landmark newLandmark = new Landmark(landmarkForm.getName(), landmarkForm.getDescription());
        if (landmarkForm.getLocation() != null){
            newLandmark.setLocation(landmarkForm.getLocation());
        }

        if (landmarkForm.getPicture() != null){
            newLandmark.setImage(landmarkForm.getPicture());
        }

        landmarkService.create(newLandmark);
        notificationService.addInfoMessage("Successfully created landmark");

        return "redirect:/landmarks/manage";
    }
}
