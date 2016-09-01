package com.markmove.services.user;

import com.markmove.models.User;

import java.util.List;

public interface UserService {
    List<User> findAll();
    User findByEmail(String email);
    User findByUsername(String username);
    List<User> findAllOrderedByUsername();
    User findById(Long id);
    User create(User user);
    User edit(User user);
    void deleteById(Long id);
    User login(String username, String password);
    User register(String username, String password, String fullName);
    void setPassword(String username, String newPassword);
}
