package com.markmove.services;

import com.markmove.models.Landmark;
import com.markmove.repositories.LandmarkRepository;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.context.annotation.Primary;
import org.springframework.stereotype.Service;

import java.util.List;

@Service
@Primary
public class LandmarkServiceImpl implements LandmarkService {
    @Autowired
    private LandmarkRepository landmarkRepository;

    @Override
    public List<Landmark> findAll() {
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
    public Landmark edit(Landmark landmark) {
        return this.landmarkRepository.save(landmark);
    }

    @Override
    public void deleteById(Long id) {
        this.landmarkRepository.delete(id);
    }
}
