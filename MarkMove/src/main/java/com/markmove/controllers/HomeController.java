package com.markmove.controllers;

import com.markmove.services.SystemNotificationService;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestMethod;
import org.springframework.web.bind.annotation.RequestParam;

@Controller
public class HomeController {

    @Autowired
    private SystemNotificationService systemNotificationService;


    @RequestMapping(value = "/", method = RequestMethod.GET)
    public String index(@RequestParam(value = "logout", required = false) String logoutSuccess) {
        if (logoutSuccess != null) {
            this.systemNotificationService.addInfoMessage("Logged out successfully!");
        }

        return "index";
    }

}
