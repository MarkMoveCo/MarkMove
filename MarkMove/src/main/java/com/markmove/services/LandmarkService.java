package com.markmove.services;

import com.markmove.models.Landmark;
import org.springframework.data.domain.Page;
import org.springframework.data.domain.Pageable;


public interface LandmarkService {
    Page<Landmark> listAllByPage(Pageable pageable);
    Landmark findById(Long id);
    Landmark create(Landmark landmark);
    Landmark edit(Landmark landmark);
    void deleteById(Long id);
}
