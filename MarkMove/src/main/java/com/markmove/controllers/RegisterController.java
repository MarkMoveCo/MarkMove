package com.markmove.controllers;

import com.markmove.constants.Messages;
import com.markmove.forms.RegisterForm;
import com.markmove.models.User;
import com.markmove.services.SystemNotificationService;
import com.markmove.services.user.UserService;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.beans.factory.annotation.Qualifier;
import org.springframework.security.authentication.AuthenticationManager;
import org.springframework.security.authentication.UsernamePasswordAuthenticationToken;
import org.springframework.security.core.Authentication;
import org.springframework.security.core.context.SecurityContextHolder;
import org.springframework.security.core.userdetails.UserDetails;
import org.springframework.security.core.userdetails.UserDetailsService;
import org.springframework.security.web.authentication.WebAuthenticationDetails;
import org.springframework.stereotype.Controller;
import org.springframework.validation.BindingResult;
import org.springframework.web.bind.annotation.*;

import javax.servlet.http.HttpServletRequest;
import javax.validation.ConstraintViolationException;
import javax.validation.Valid;

@Controller
public class RegisterController {

    @Autowired
    private UserService userService;

    @Autowired
    private AuthenticationManager authMgr;

    @Autowired
    private UserDetailsService userDetailsSvc;


    @Autowired
    private SystemNotificationService notificationService;


    @RequestMapping(value = "/register", method = RequestMethod.GET)
    public String register(RegisterForm registerForm) {
        return "/register";
    }

    @RequestMapping(value = "/register/check", method = RequestMethod.GET)
    @ResponseBody
    public String checkIfUsernameIsFree(@RequestParam(value = "username", required = false) String username,
                                        @RequestParam(value = "email", required = false) String email) {
        if (username != null) {
            User isUserWithUserNamePresent = this.userService.findByUsername(username);
            Boolean isUsernameFree = isUserWithUserNamePresent == null;
            return isUsernameFree.toString();
        }

        User isUserWithEmailPresent = this.userService.findByEmail(email);
        Boolean isEmailFree = isUserWithEmailPresent == null;
        return isEmailFree.toString();
    }

    @RequestMapping(value = "/register", method = RequestMethod.POST)
    public String registerPage(@Valid RegisterForm registerForm, BindingResult bindingResult) {

        if (bindingResult.hasErrors()) {
            this.notificationService.addErrorMessage("Please fill the form correctly!");
            return "/register";
        }


        User newUser = new User(registerForm.getUsername(), registerForm.getPassword(), registerForm.getEmail(), registerForm.getAge(), registerForm.getGender());
        newUser = this.userService.create(newUser);
        this.notificationService.addInfoMessage("Registration successful");
        return this.autoLogin(newUser, registerForm.getPassword());
    }

    private String autoLogin(User user, String password) {
        // perform login authentication
        try {
            UserDetails userDetails = userDetailsSvc.loadUserByUsername(user.getUsername());
            UsernamePasswordAuthenticationToken auth = new UsernamePasswordAuthenticationToken(userDetails, password, userDetails.getAuthorities());
            authMgr.authenticate(auth);

            if(auth.isAuthenticated()) {
                SecurityContextHolder.getContext().setAuthentication(auth);
                this.notificationService.addInfoMessage(Messages.LOGGED_IN_OK);
                return "redirect:/";
            }
        } catch (Exception e) {
            this.notificationService.addErrorMessage("Problem authenticating user" + user.getUsername());
        }

        return "redirect:/login";
    }

}

