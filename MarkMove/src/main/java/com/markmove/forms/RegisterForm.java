package com.markmove.forms;

import com.markmove.constants.Messages;
import org.hibernate.validator.constraints.Email;

import javax.validation.constraints.Min;
import javax.validation.constraints.NotNull;
import javax.validation.constraints.Size;

public class RegisterForm {
    @NotNull
    @Size(min=2, max=30, message = Messages.USERNAME_SIZE_ERROR)
    private String username;

    @NotNull
    @Size(min=4, max=32, message = Messages.PASSWORD_SIZE_ERROR)
    private String password;

    @NotNull(message = Messages.PASSWORDS_DO_NOT_MATCH_ERROR)
    private String confirmPassword;

    @NotNull
    @Email
    private String email;

    @Min(7)
    private int age;

    @NotNull
    private String gender;

    public RegisterForm() {

    }

    public String getUsername() {
        return username;
    }

    public void setUsername(String username) {
        this.username = username;
    }

    public String getPassword() {
        return password;
    }

    public void setPassword(String password) {
        this.password = password;
        this.checkPassword();
    }

    public String getConfirmPassword() {
        return confirmPassword;
    }

    public void setConfirmPassword(String confirmPassword) {
        this.confirmPassword = confirmPassword;
    }

    public String getEmail() {
        return email;
    }

    public void setEmail(String email) {
        this.email = email;
    }

    public int getAge() {
        return age;
    }

    public void setAge(int age) {
        this.age = age;
    }

    public String getGender() {
        return gender;
    }

    public void setGender(String gender) {
        this.gender = gender;
    }

    private void checkPassword() {
        if(this.password == null || this.confirmPassword == null){
            return;
        }else if(!this.password.equals(confirmPassword)){
            this.confirmPassword = null;
        }
    }
}
