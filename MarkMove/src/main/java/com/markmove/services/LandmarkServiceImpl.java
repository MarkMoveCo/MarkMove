package com.markmove.services;

import com.markmove.forms.LandmarkForm;
import com.markmove.models.Landmark;
import com.markmove.models.Picture;
import com.markmove.repositories.LandmarkRepository;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.context.annotation.Primary;
import org.springframework.data.domain.Page;
import org.springframework.stereotype.Service;

import org.springframework.data.domain.Pageable;
import org.springframework.web.multipart.MultipartFile;

import java.util.HashSet;
import java.util.List;
import java.util.Objects;
import java.util.Set;

@Service
@Primary
public class LandmarkServiceImpl implements LandmarkService {

    @Autowired
    private LandmarkRepository landmarkRepository;

    @Override
    public List<Landmark> findAll(){
        return this.landmarkRepository.findAll();
    }

    @Override
    public Landmark findById(Long id) {
        return this.landmarkRepository.findOne(id);
    }

    @Override
    public Landmark create(Landmark landmark) {
        return this.landmarkRepository.save(landmark);
    }

    @Override
    public Landmark edit(Landmark landmark, LandmarkForm landmarkForm, Picture picture) {
        if (!Objects.equals(landmark.getName(), landmarkForm.getName())) {
            landmark.setName(landmarkForm.getName());
        }

        if (!Objects.equals(landmark.getLocation(), landmarkForm.getLocation())) {
            landmark.setLocation(landmarkForm.getLocation());
        }

        if (!Objects.equals(landmark.getDescription(), landmarkForm.getDescription())) {
            landmark.setDescription(landmarkForm.getDescription());
        }

        if (picture != null){
            Set<Picture> currentPictures = landmark.getPictures();
            currentPictures.clear();
            currentPictures.add(picture);
        }

        return this.landmarkRepository.save(landmark);
    }

    @Override
    public void deleteById(Long id) {
        this.landmarkRepository.delete(id);
    }

    @Override
    public Page<Landmark> listAllByPage(Pageable pageable) {
        return this.landmarkRepository.findAll(pageable);
    }
}
