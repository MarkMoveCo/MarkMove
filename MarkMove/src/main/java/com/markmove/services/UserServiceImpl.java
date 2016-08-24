package com.markmove.services;

import com.markmove.models.User;
import com.markmove.repositories.RoleRepository;
import com.markmove.repositories.UserRepository;
import com.markmove.services.UserService;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.context.annotation.Primary;
import org.springframework.security.crypto.bcrypt.BCryptPasswordEncoder;
import org.springframework.stereotype.Service;

import java.util.HashSet;
import java.util.List;

@Service
@Primary
public class UserServiceImpl implements UserService {

    @Autowired
    private UserRepository userRepository;

    @Autowired
    private RoleRepository roleRepository;

    @Autowired
    private BCryptPasswordEncoder bCryptPasswordEncoder;

    @Override
    public List<User> findAll() {
        return this.userRepository.findAll();
    }

    @Override
    public User findByUsername(String username) {
        return this.userRepository.findByUsername(username);
    }

    @Override
    public User findById(Long id) {
        return this.userRepository.findOne(id);
    }

    @Override
    public User create(User user) {
        user.setPasswordHash(bCryptPasswordEncoder.encode(user.getPasswordHash()));
        user.setRoles(new HashSet<>(roleRepository.findAll()));

        return this.userRepository.save(user);
    }

    @Override
    public User edit(User user) {
        return this.userRepository.save(user);
    }

    @Override
    public void deleteById(Long id) {
        this.userRepository.delete(id);
    }

    @Override
    public boolean authenticate(String username, String password) {
        throw new UnsupportedOperationException("Operation not implemented");
    }

    @Override
    public User login(String username, String password) {
        throw new UnsupportedOperationException("Operation not implemented");
    }

    @Override
    public User register(String username, String password, String fullName) {
        throw new UnsupportedOperationException("Operation not implemented");
    }

    @Override
    public void setPassword(String username, String newPassword) {
        throw new UnsupportedOperationException("Operation not implemented");
    }
}
