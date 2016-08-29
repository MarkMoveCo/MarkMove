package com.markmove.controllers;

import com.markmove.services.SystemNotificationService;
import com.markmove.services.UserService;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestMethod;
import org.springframework.web.bind.annotation.RequestParam;

@Controller
public class LoginController {

    @Autowired
    private UserService userService;

    @Autowired
    private SystemNotificationService notifyService;

    @RequestMapping(value = "/login", method = RequestMethod.GET)
    public String login(@RequestParam(value = "error", required = false) String error) {

        if (error != null) {
            this.notifyService.addErrorMessage("Invalid login");

        }

        return "login";
    }

}

