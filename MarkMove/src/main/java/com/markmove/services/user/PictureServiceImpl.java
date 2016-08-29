package com.markmove.services.user;

import com.markmove.constants.Messages;
import com.markmove.models.Picture;
import com.markmove.models.User;
import com.markmove.repositories.PictureRepository;
import com.markmove.repositories.UserRepository;
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


    private static final String ROOT = "src/main/resources/pictures"; // TODO: Make more flexible (run-time) if possible;
    private static final String TEMP_PICTURE_NAME = "temp";

    @Autowired
    private SystemNotificationService systemNotificationService;

    @Autowired
    private PictureRepository pictureRepository;

    @Autowired
    private UserRepository userRepository;

    @Override
    public Picture create(MultipartFile file, String username, boolean isProfilePicture) {
        if (!file.isEmpty()) {
            try {
                String content = file.getContentType();
                String [] tokens = content.split("/");
                if ("image".equals(tokens[0])){
                    InputStream inputStream = file.getInputStream();
                    Path path = Paths.get(ROOT, TEMP_PICTURE_NAME + "." + tokens[1]);
                    Files.copy(inputStream, path);
                    User user = this.userRepository.findByUsername(username);
                    Picture picture = new Picture(path.toString(), user);
                    this.pictureRepository.save(picture);
                    if (!isProfilePicture){
                        Files.move(path, path.resolveSibling(picture.getId().toString() + "." + tokens[1])); // RENAME FILE AS ITS ID NUMBER IN THE DB
                    }
                    else {
                        Files.move(path, path.resolveSibling(username + "." + tokens[1])); //   RENAME FILE TO ITS USER'S USERNAME
                    }

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
