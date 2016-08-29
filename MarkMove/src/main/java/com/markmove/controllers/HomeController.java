package com.markmove.controllers;

import com.markmove.services.SystemNotificationService;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestMethod;
import org.springframework.web.bind.annotation.RequestParam;

@Controller
public class HomeController {

    @Autowired
    private SystemNotificationService systemNotificationService;


    @RequestMapping(value = "/", method = RequestMethod.GET)
<<<<<<< .mine
    public String index(Model model,
        @RequestParam(value = "logout", required = false) String logoutSuccess){
        if (logoutSuccess != null) {
            this.systemNotificationService.addInfoMessage("Logged out successfully!");
        }

||||||| .r131
    public String index(Model model){

=======
    public String index(){
>>>>>>> .r141
        return "index";
    }
<<<<<<< .mine

    @RequestMapping("/landmarks")
    public String landmarks(){
        return "landmarks";
    }
||||||| .r131

    @RequestMapping("/landmarks")
    public String landmarks(Model model){
        model.addAttribute("user", "Hashim");
        return "landmarks";
    }
=======
>>>>>>> .r141
}
