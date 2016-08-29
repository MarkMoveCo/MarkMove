package com.markmove.models;

import javax.persistence.*;
import java.time.LocalDateTime;
import java.util.Set;

@Entity
@Table(name = "notification")
public class Notification {

    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    private Long id;

    @Column(nullable = false)
    private String message;

    @Column(nullable = false)
    private LocalDateTime timeOfCreation;

    @OneToMany(mappedBy = "notification")
    private Set<UserNotification> userNotifications;

    public Notification(String message) {
        this.setMessage(message);
        this.setTimeOfCreation(LocalDateTime.now());
    }

    public Long getId() {
        return id;
    }

    public void setId(Long id) {
        this.id = id;
    }

    public String getMessage() {
        return message;
    }

    public void setMessage(String message) {
        this.message = message;
    }

    public LocalDateTime getTimeOfCreation() {
        return timeOfCreation;
    }

    public void setTimeOfCreation(LocalDateTime timeOfCreation) {
        this.timeOfCreation = timeOfCreation;
    }

    public Set<UserNotification> getUserNotifications() {
        return userNotifications;
    }

    public void setUserNotifications(Set<UserNotification> userNotifications) {
        this.userNotifications = userNotifications;
    }
}
