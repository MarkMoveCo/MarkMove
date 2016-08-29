package com.markmove.controllers;

import com.markmove.forms.RegisterForm;
import com.markmove.models.User;
import com.markmove.services.SystemNotificationService;
import com.markmove.services.UserService;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.security.authentication.AuthenticationManager;
import org.springframework.security.authentication.UsernamePasswordAuthenticationToken;
import org.springframework.security.core.Authentication;
import org.springframework.security.core.context.SecurityContextHolder;
import org.springframework.security.web.authentication.WebAuthenticationDetails;
import org.springframework.stereotype.Controller;
import org.springframework.validation.BindingResult;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestMethod;

import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import javax.validation.Valid;

@Controller
public class RegisterController {

    @Autowired
    private UserService userService;

    @Autowired
    private SystemNotificationService notifyService;

    @Autowired
    private AuthenticationManager authenticationManager;


    @RequestMapping(value = "/register", method = RequestMethod.GET)
    public String register(RegisterForm registerForm) {
        return "/register";
    }

    @RequestMapping(value = "/register", method = RequestMethod.POST)
    public String registerPage(@Valid RegisterForm registerForm, BindingResult bindingResult, HttpServletRequest request) {

        if (bindingResult.hasErrors()) {
            notifyService.addErrorMessage("Please fill the form correctly!");
            return "/register";
        }


        User newUser = new User(registerForm.getUsername(), registerForm.getPassword(), registerForm.getEmail(), registerForm.getAge(), registerForm.getGender());
        newUser = userService.create(newUser);

        this.autoLogin(newUser, request);
        notifyService.addInfoMessage("Registration successful");

        return "redirect:/";
    }
// TODO: ADD EXCPETION HANDLER
    private void autoLogin(User user, HttpServletRequest request) {
        String username = user.getUsername();
        String password = user.getPasswordHash();
        UsernamePasswordAuthenticationToken token = new UsernamePasswordAuthenticationToken(username, password);

        // generate session if one doesn't exist
        request.getSession();

        token.setDetails(new WebAuthenticationDetails(request));
        Authentication authenticatedUser = authenticationManager.authenticate(token);

        SecurityContextHolder.getContext().setAuthentication(authenticatedUser);
    }
}

