package com.markmove.services.user;

import com.markmove.models.Notification;
import com.markmove.models.User;
import com.markmove.models.UserNotification;
import com.markmove.repositories.NotificationRepository;
import com.markmove.repositories.UserNotificationRepository;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

@Service
public class NotificationServiceImpl implements NotificationService {

    @Autowired
    private NotificationRepository notificationRepository;

    @Autowired
    private UserNotificationRepository userNotificationRepository;


    @Override
    public Notification create(Notification notification) {
        return this.notificationRepository.save(notification);
    }

    @Override
    public void notifyUsersWithNotification(Notification notification, Iterable<User> users) {
        for (User user : users) {
            UserNotification userNotification = new UserNotification(user, notification);
            this.userNotificationRepository.save(userNotification);
        }
    }
}
