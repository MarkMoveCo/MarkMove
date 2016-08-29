package com.markmove.repositories;

import com.markmove.models.Picture;
import org.springframework.data.jpa.repository.JpaRepository;


public interface PictureRepository extends JpaRepository<Picture, Long> {
}
