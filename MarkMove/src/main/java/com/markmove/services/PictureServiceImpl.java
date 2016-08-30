package com.markmove.services;

import com.markmove.constants.Messages;
import com.markmove.models.Landmark;
import com.markmove.models.Picture;
import com.markmove.models.User;
import com.markmove.repositories.PictureRepository;
import com.markmove.services.PictureService;
import com.markmove.services.SystemNotificationService;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;
import org.springframework.web.multipart.MultipartFile;

import java.io.IOException;
import java.io.InputStream;
import java.nio.file.Files;
import java.nio.file.Path;
import java.nio.file.Paths;

@Service
public class PictureServiceImpl implements PictureService {

    private static final String RESOURCES_PATH = "src/main/resources";
    private static final String PICTURES_FOLDER_NAME = "images";
    private static final String PUBLIC_CONTENTS_FOLDER = "public";
    private static final String PICTURES_PATH = RESOURCES_PATH + "/" + PUBLIC_CONTENTS_FOLDER + "/" + PICTURES_FOLDER_NAME; // TODO: Make more flexible (run-time) if possible;
    private static final String TEMP_PICTURE_NAME = "temp";

    @Autowired
    private SystemNotificationService systemNotificationService;

    @Autowired
    private PictureRepository pictureRepository;


    @Override
    public Picture create(MultipartFile file, Landmark landmark) {
        Picture landmarkPicture = new Picture(landmark);
       return this.createPicture(file, landmarkPicture, false);
    }

    @Override
    public Picture create(MultipartFile file, User user, boolean isProfilePicture) {
        Picture userPicture = new Picture(user);
        return this.createPicture(file, userPicture, isProfilePicture);
    }

    private Picture createPicture(MultipartFile file, Picture picture, boolean isProfilePicture) {
        if (!file.isEmpty()) {
            try {
                String content = file.getContentType();
                String [] tokens = content.split("/");
                if ("image".equals(tokens[0])){
                    InputStream inputStream = file.getInputStream();
                    Path path = Paths.get(PICTURES_PATH, TEMP_PICTURE_NAME + "." + tokens[1]);
                    Files.copy(inputStream, path);
                    picture.setLocation(path.toString());
                    this.pictureRepository.save(picture);
                    Path actualPath;
                    if (!isProfilePicture){
                        actualPath = path.resolveSibling(picture.getId().toString() + "." + tokens[1]);
                        Files.move(path, actualPath); // RENAME FILE AS ITS ID NUMBER IN THE DB
                    }
                    else {
                        actualPath = path.resolveSibling(picture.getUser().getUsername() + "." + tokens[1]);
                        Files.move(path, actualPath); //   RENAME FILE TO ITS USER'S USERNAME
                    }

                    String actualPathAsString = actualPath.toString();
                    int pictureNameStartIndex = actualPathAsString.lastIndexOf(PICTURES_FOLDER_NAME)  + PICTURES_FOLDER_NAME.length() + 1;   // BECAUSE \pictureName we dont need the slash
                    String pictureName = actualPathAsString.substring(pictureNameStartIndex, actualPathAsString.length());
                    String relativePath = "/" + PICTURES_FOLDER_NAME +  "/" + pictureName;
                    picture.setLocation(relativePath);
                    this.pictureRepository.save(picture);
                    this.systemNotificationService.addInfoMessage(String.format(Messages.PICTURE_UPLOAD_OK, file.getOriginalFilename()));
                    return picture;
                }
                else {
                    this.systemNotificationService.addErrorMessage(String.format(Messages.PICTURE_UPLOAD_FAILURE, file.getOriginalFilename())
                            + " Because it is not an image!");
                }

            } catch (IOException |RuntimeException e) {
                this.systemNotificationService.addErrorMessage(String.format(Messages.PICTURE_UPLOAD_FAILURE, file.getOriginalFilename()));
            }
        } else {
            this.systemNotificationService.addErrorMessage(String.format(Messages.PICTURE_UPLOAD_FAILURE, file.getOriginalFilename())
                    + " Because it was empty!");
        }

        return null;
    }
}
