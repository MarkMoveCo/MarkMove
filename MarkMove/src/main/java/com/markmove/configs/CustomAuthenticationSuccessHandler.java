package com.markmove.configs;

import com.markmove.constants.Messages;
import com.markmove.services.system.SystemNotificationService;
import jdk.nashorn.internal.ir.annotations.Ignore;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.security.core.Authentication;
import org.springframework.security.web.authentication.SimpleUrlAuthenticationSuccessHandler;
import org.springframework.stereotype.Component;

import javax.servlet.ServletException;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import java.io.IOException;

/**
 * This Class is currently not used, We are using the Default one of Spring Security
  */
@Ignore
@Component
public class CustomAuthenticationSuccessHandler extends SimpleUrlAuthenticationSuccessHandler {

    @Autowired
    private SystemNotificationService systemNotificationService;

    @Override
    public void onAuthenticationSuccess(HttpServletRequest request, HttpServletResponse response, Authentication authentication) throws IOException, ServletException {
        this.systemNotificationService.addInfoMessage(Messages.LOGGED_IN_OK);
        super.onAuthenticationSuccess(request, response, authentication);
    }
}
