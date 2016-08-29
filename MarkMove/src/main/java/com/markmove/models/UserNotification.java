package com.markmove.models;

import javax.persistence.*;

@Entity
@Table(name = "user_notification")
public class UserNotification {

    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    private Long id;

    @Column(nullable = false)
    private boolean isUserNotified;

    @ManyToOne(cascade = CascadeType.ALL)
    @JoinColumn(name = "user_id")
    private User user;

    @ManyToOne(cascade = CascadeType.ALL)
    @JoinColumn(name = "notification_id")
    private Notification notification;

    public UserNotification(User user, Notification notification) {
        this.setUser(user);
        this.setNotification(notification);
        this.setUserNotified(false);
    }

    public Long getId() {
        return id;
    }

    public void setId(Long id) {
        this.id = id;
    }

    public boolean isUserNotified() {
        return isUserNotified;
    }

    public void setUserNotified(boolean userNotified) {
        isUserNotified = userNotified;
    }

    public User getUser() {
        return user;
    }

    public void setUser(User user) {
        this.user = user;
    }

    public Notification getNotification() {
        return notification;
    }

    public void setNotification(Notification notification) {
        this.notification = notification;
    }
}
