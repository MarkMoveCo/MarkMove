package com.markmove.services.user;

import com.markmove.constants.Messages;
import com.markmove.models.Role;
import com.markmove.models.User;
import com.markmove.repositories.RoleRepository;
import com.markmove.repositories.UserRepository;
import com.markmove.services.role.RoleService;
import com.markmove.services.system.SystemNotificationService;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.context.annotation.Primary;
import org.springframework.security.authentication.UsernamePasswordAuthenticationToken;
import org.springframework.security.core.Authentication;
import org.springframework.security.core.GrantedAuthority;
import org.springframework.security.core.authority.SimpleGrantedAuthority;
import org.springframework.security.core.context.SecurityContextHolder;
import org.springframework.security.crypto.bcrypt.BCryptPasswordEncoder;
import org.springframework.stereotype.Service;
import org.springframework.util.MultiValueMap;

import java.util.HashSet;
import java.util.List;
import java.util.Map;
import java.util.Set;
import java.util.stream.Collectors;

@Service
@Primary
public class UserServiceImpl implements UserService {

    @Autowired
    private UserRepository userRepository;

    @Autowired
    private RoleRepository roleRepository;

    @Autowired
    private BCryptPasswordEncoder bCryptPasswordEncoder;

    @Autowired
    private SystemNotificationService systemNotificationService;

    @Autowired
    private RoleService roleService;

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
        HashSet<Role> roles = new HashSet<>();

        // adding role USER
        roles.add(roleRepository.findByName("USER"));

        user.setRoles(roles);

        return this.userRepository.save(user);
    }

    @Override
    public List<User> findAllOrderedByUsername() {
        return this.userRepository.findAllByOrderByUsernameAsc();
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
    public User findByEmail(String email) {
        return this.userRepository.findByEmail(email);
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

    @Override
    public boolean editPermissions(MultiValueMap<String, String> map, String currentUsername) {
        boolean editedAtLeastOne = false;
        boolean shouldRefreshUserDetails = false;
        for (Map.Entry<String, List<String>> pairs : map.entrySet()) {      //  the key looks like USER[index-of-its-pos][ROLE] => True/False
            int firstBracesPos = pairs.getKey().indexOf("[");
            String username = pairs.getKey().substring(0, firstBracesPos);

            int lasBracesPos = pairs.getKey().lastIndexOf("[");
            String roleName = pairs.getKey().substring(lasBracesPos + 1, pairs.getKey().length() - 1);
            Boolean isChecked = Boolean.parseBoolean(pairs.getValue().get(0));
            User userToEditPermission = this.findByUsername(username);
            if (userToEditPermission == null) {
                this.systemNotificationService.addErrorMessage(String.format(Messages.EDIT_PERMISSIONS_ERROR, username));
            }

            if (isChecked) {
                Role newRoleToAssign = this.roleService.findByName(roleName);
                userToEditPermission.getRoles().add(newRoleToAssign);
            } else {
                Role roleToRemove = this.roleService.findByName(roleName);
                userToEditPermission.getRoles().remove(roleToRemove);
            }

            this.edit(userToEditPermission);
            editedAtLeastOne = true;
            if (userToEditPermission.getUsername().equals(currentUsername)) {
                shouldRefreshUserDetails = true;
            }
        }

        if (!editedAtLeastOne) {
            this.systemNotificationService.addErrorMessage(Messages.NO_CHANGES_DETECTED_WARNING);
            return false;
        } else {
            this.systemNotificationService.addInfoMessage(Messages.EDIT_PERMISSIONS_OK);
            if (shouldRefreshUserDetails) {
                this.refreshUserPermissions(this.userRepository.findByUsername(currentUsername));
            }

            return true;
        }
    }

    private void refreshUserPermissions(User user) {
        Authentication auth = SecurityContextHolder.getContext().getAuthentication();

        Set<GrantedAuthority> updatedAuthorities = user.getRoles()
                .stream()
                .map(role -> new SimpleGrantedAuthority(role.getName()))
                .collect(Collectors.toSet());

        Authentication newAuth = new UsernamePasswordAuthenticationToken(auth.getPrincipal(), auth.getCredentials(), updatedAuthorities);

        SecurityContextHolder.getContext().setAuthentication(newAuth);
    }
}
