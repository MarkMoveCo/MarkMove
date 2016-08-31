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
import org.springframework.util.MultiValueMap;
import org.springframework.web.bind.annotation.*;
import org.springframework.web.multipart.MultipartFile;

import java.io.IOException;
import java.security.Principal;
import java.util.*;

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

        this.systemNotificationService.addInfoMessage("Successfully uploaded picture");
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

    @RequestMapping(method = RequestMethod.POST, value = "/users/permissions")
    @ResponseBody
    public void editUsersPermissions(@RequestBody MultiValueMap<String, String> map) {
        boolean editedAtLeastOne = false;
        for (Map.Entry<String, List<String>> pairs : map.entrySet()) {
            int firstBracesPos = pairs.getKey().indexOf("[");
            String username = pairs.getKey().substring(0, firstBracesPos);
            int lasBracesPos = pairs.getKey().lastIndexOf("[");
            String roleName = pairs.getKey().substring(lasBracesPos + 1, pairs.getKey().length() - 1);
            Boolean isChecked = Boolean.parseBoolean(pairs.getValue().get(0));
            User userToEditPermission = this.userService.findByUsername(username);
            if (userToEditPermission == null) {
                this.systemNotificationService.addErrorMessage("Failed to change Permissions of User: " + username);
            }

            if (isChecked) {
                Role newRoleToAssign = this.roleService.findByName(roleName);
                userToEditPermission.getRoles().add(newRoleToAssign);
            } else {
                Role roleToRemove = this.roleService.findByName(roleName);
                userToEditPermission.getRoles().remove(roleToRemove);
            }

            this.userService.edit(userToEditPermission);
            editedAtLeastOne = true;
        }

        if (!editedAtLeastOne) {
            this.systemNotificationService.addErrorMessage("No changes in the permissions was detected!");
        } else {
            this.systemNotificationService.addInfoMessage("Successfully edited Permissions");
        }

    }

    @RequestMapping(method = RequestMethod.GET, value = "/users/profile/{username}")
    public String showProfile(Model model, @PathVariable("username") String username) {
        User desiredUser = this.userService.findByUsername(username);
        model.addAttribute("user", desiredUser);
        return "users/profile";
    }


}
