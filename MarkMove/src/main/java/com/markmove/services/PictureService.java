package com.markmove.services;


import com.markmove.models.Picture;
import org.springframework.web.multipart.MultipartFile;

public interface PictureService {
    Picture create(MultipartFile file, String username, boolean isProfilePicture);
}