package com.markmove.controllers;

import com.markmove.forms.LandmarkForm;
import com.markmove.models.Landmark;
import com.markmove.services.LandmarkService;
import com.markmove.services.SystemNotificationService;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.validation.BindingResult;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestMethod;

import javax.validation.Valid;
import java.util.List;

@Controller
public class LandmarksController {
    @Autowired
    private LandmarkService landmarkService;

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
    public String createLandmark(@Valid LandmarkForm landmarkForm, BindingResult bindingResult){
        Landmark newLandmark = new Landmark(landmarkForm.getName(), landmarkForm.getDescription());
        if (landmarkForm.getLocation() != null){
            newLandmark.setLocation(landmarkForm.getLocation());
        }

        if (landmarkForm.getPicture() != null){
            newLandmark.setPicture(landmarkForm.getPicture());
        }

        landmarkService.create(newLandmark);
        notificationService.addInfoMessage("Successfully created landmark");

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
