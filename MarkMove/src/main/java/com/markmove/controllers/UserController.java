package com.markmove.controllers;

import com.markmove.constants.Messages;
import com.markmove.services.PictureService;
import com.markmove.services.SystemNotificationService;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestMethod;
import org.springframework.web.bind.annotation.RequestParam;
import org.springframework.web.multipart.MultipartFile;

import java.io.IOException;
import java.io.InputStream;
import java.nio.file.Files;
import java.nio.file.Path;
import java.nio.file.Paths;
import java.security.Principal;

@Controller
public class UserController {

    @Autowired
    private PictureService pictureService;

    @Autowired
    private SystemNotificationService systemNotificationService;

    @RequestMapping(value = "/login", method = RequestMethod.GET)
    public String login(@RequestParam(value = "error", required = false) String error) {

        if (error != null) {
            this.systemNotificationService.addErrorMessage("Invalid login");

        }

        return "login";
    }

    @RequestMapping(method = RequestMethod.GET, value = "/uploadPicture")
    public String provideUploadInfo() throws IOException {

        return "uploadPicture";
    }

    @RequestMapping(method = RequestMethod.POST, value = "/uploadPicture")
    public String handleFileUpload(@RequestParam("file") MultipartFile file, Principal principal) {

        this.pictureService.create(file, principal.getName(), false);
        return "redirect:/";
    }
}
