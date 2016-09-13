package com.markmove.controllers;

import com.markmove.constants.Messages;
import com.markmove.services.system.SystemNotificationService;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.web.bind.annotation.*;

@Controller
public class HomeController {

    @Autowired
    private SystemNotificationService systemNotificationService;


    @RequestMapping(value = "/", method = RequestMethod.GET)
    public String index(@RequestParam(value = "logout", required = false) String logoutSuccess) {
        if (logoutSuccess != null) {
            this.systemNotificationService.addInfoMessage(Messages.LOGGED_OUT_OK);
        }

        return "index";
    }

}
