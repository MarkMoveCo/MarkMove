package com.markmove.services;

import com.markmove.models.Landmark;

import java.util.List;

public interface LandmarkService {
    List<Landmark> findAll();
    Landmark findById(Long id);
    Landmark create(Landmark landmark);
    Landmark edit(Landmark landmark);
    void deleteById(Long id);
}
