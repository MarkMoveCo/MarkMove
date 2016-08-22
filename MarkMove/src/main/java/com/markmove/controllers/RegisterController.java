package com.markmove.controllers;

import com.markmove.forms.RegisterForm;
import com.markmove.services.NotificationService;
import com.markmove.services.UserService;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.validation.BindingResult;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestMethod;

import javax.validation.Valid;

@Controller
public class RegisterController {

    @Autowired
    private UserService userService;

    @Autowired
    private NotificationService notifyService;

    @RequestMapping("/register")
    public String register(RegisterForm registerForm) {
        return "/register";
    }

    @RequestMapping(value = "/register", method = RequestMethod.POST)
    public String registerPage(@Valid RegisterForm registerForm, BindingResult bindingResult) {
        if (bindingResult.hasErrors()) {
            notifyService.addErrorMessage("Please fill the form correctly!");
            return "/register";
        }

        if (!userService.authenticate(
                registerForm.getUsername(), registerForm.getPassword())) {
            notifyService.addErrorMessage("Invalid registration!");
            return "/register";
        }

        notifyService.addInfoMessage("Registration successful");
        return "redirect:/";
    }
}

