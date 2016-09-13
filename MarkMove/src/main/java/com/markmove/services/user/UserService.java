package com.markmove.services.user;

import com.markmove.models.User;
import org.springframework.util.MultiValueMap;

import java.util.List;

public interface UserService {
    List<User> findAll();
    User findByEmail(String email);
    User findByUsername(String username);
    List<User> findAllOrderedByUsername();
    User findById(Long id);
    User create(User user);
    User edit(User user);
    boolean editPermissions(MultiValueMap<String, String> map, String currentUsername);
    void deleteById(Long id);
    User login(String username, String password);
    User register(String username, String password, String fullName);
    void setPassword(String username, String newPassword);
}
