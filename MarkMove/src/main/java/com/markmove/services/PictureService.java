package com.markmove.services;


import com.markmove.models.Landmark;
import com.markmove.models.Picture;
import com.markmove.models.User;
import org.springframework.web.multipart.MultipartFile;

public interface PictureService {
    Picture create(MultipartFile file, User user, boolean isProfilePicture);
    Picture create(MultipartFile file, Landmark landmark);
}
