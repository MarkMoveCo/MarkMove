package com.markmove.controllers;

import com.markmove.models.Role;
import com.markmove.models.User;
import com.markmove.services.PictureService;
import com.markmove.services.RoleService;
import com.markmove.services.SystemNotificationService;
import com.markmove.services.user.UserService;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestMethod;
import org.springframework.web.bind.annotation.RequestParam;
import org.springframework.web.multipart.MultipartFile;

import java.io.IOException;
import java.security.Principal;
import java.util.List;

@Controller
public class UserController {

    @Autowired
    private PictureService pictureService;

    @Autowired
    private UserService userService;

    @Autowired
    private RoleService roleService;

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

        User currentUser = this.userService.findByUsername(principal.getName());
        this.pictureService.create(file, currentUser, false);
        return "redirect:/";
    }

    @RequestMapping(method = RequestMethod.GET, value = "/users/permissions")
    public String editUsersPermissions(Model model) {
        Iterable<User> users = this.userService.findAllOrderedByUsername();
        Iterable<Role> roles = this.roleService.findAllOrderedById();
        model.addAttribute("users", users);
        model.addAttribute("roles", roles);
        return "users/permissions";
    }
}
