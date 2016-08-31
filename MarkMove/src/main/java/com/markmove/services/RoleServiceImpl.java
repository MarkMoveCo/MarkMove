package com.markmove.services;

import com.markmove.models.Role;
import com.markmove.repositories.RoleRepository;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

@Service
public class RoleServiceImpl implements RoleService {


    @Autowired
    private RoleRepository roleRepository;

    @Override
    public Iterable<Role> findAllOrderedById() {
        return this.roleRepository.findAllByOrderByIdDesc();
    }

    @Override
    public Role findByName(String name) {
        return this.roleRepository.findByName(name);
    }
}
