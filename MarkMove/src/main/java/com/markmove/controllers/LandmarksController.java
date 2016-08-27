package com.markmove.controllers;

import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.RequestMapping;

@Controller
public class LandmarksController {

    @RequestMapping("/landmarks")
    public String landmarks(Model model){

        return "landmarks/landmarks";
    }
}
