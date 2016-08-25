package com.markmove.controllers;

import com.markmove.forms.RegisterForm;
import com.markmove.models.User;
import com.markmove.services.NotificationService;
import com.markmove.services.SecurityService;
import com.markmove.services.UserService;
import com.markmove.validator.UserValidator;
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

    @Autowired
    private UserValidator userValidator;

    @Autowired
    private SecurityService securityService;

    @RequestMapping(value = "/register", method = RequestMethod.GET)
    public String register(RegisterForm registerForm) {
        return "/register";
    }

    @RequestMapping(value = "/register", method = RequestMethod.POST)
    public String registerPage(@Valid RegisterForm registerForm, BindingResult bindingResult) {
        userValidator.validate(registerForm, bindingResult);

        if (bindingResult.hasErrors()) {
            notifyService.addErrorMessage("Please fill the form correctly!");
            return "/register";
        }

        if (!userService.authenticate(
                registerForm.getUsername(), registerForm.getPassword())) {
            notifyService.addErrorMessage("Invalid registration!");
            return "/register";
        }

        userService.create(new User(registerForm.getUsername(), registerForm.getPassword(), registerForm.getEmail(), registerForm.getAge(), registerForm.getGender()));

        securityService.autologin(registerForm.getUsername(), registerForm.getPassword());
        notifyService.addInfoMessage("Registration successful");
        return "redirect:/";
    }
}

