package com.markmove.services;

import com.markmove.forms.LandmarkForm;
import com.markmove.models.Landmark;
import com.markmove.models.Picture;
import org.springframework.data.domain.Page;
import org.springframework.data.domain.Pageable;
import org.springframework.web.multipart.MultipartFile;


public interface LandmarkService {
    Page<Landmark> listAllByPage(Pageable pageable);
    Landmark findById(Long id);
    Landmark create(Landmark landmark);
    Landmark edit(Landmark landmark, LandmarkForm landmarkForm, Picture file);
    void deleteById(Long id);
}
