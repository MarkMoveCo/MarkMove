package com.markmove.services.user;

import com.markmove.models.Notification;
import com.markmove.models.User;

public interface NotificationService {
    Notification create(Notification notification);
    void notifyUsersWithNotification(Notification notification, Iterable<User> users);

}
