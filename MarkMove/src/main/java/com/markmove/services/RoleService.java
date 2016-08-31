package com.markmove.services;

import com.markmove.models.Role;

public interface RoleService {
    Iterable<Role> findAllOrderedById();
    Role findByName(String name);
}
