package com.markmove.models;

import javax.persistence.*;

@Entity
@Table(name = "picture")
public class Picture {

    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    private Long id;

    @Column(nullable = false)
    private String location;

    @ManyToOne
    private User user;

    @ManyToOne
    private Landmark landmark;

    public Picture() {

    }

    public Picture(String location, User user, Landmark landmark) {
        this.location = location;
        this.user = user;
        this.landmark = landmark;
    }

    public Picture(String location, User user) {
        this.setLocation(location);
        this.setUser(user);
    }

    public Picture(String location, Landmark landmark) {
        this.setLocation(location);
        this.setLandmark(landmark);
    }

    public Picture(User user) {
        this.setUser(user);
    }

    public Picture(Landmark landmark) {
        this.setLandmark(landmark);
    }

    public Long getId() {
        return id;
    }

    public void setId(Long id) {
        this.id = id;
    }

    public String getLocation() {
        return location;
    }

    public void setLocation(String location) {
        this.location = location;
    }

    public User getUser() {
        return user;
    }

    public void setUser(User user) {
        this.user = user;
    }

    public Landmark getLandmark() {
        return landmark;
    }

    public void setLandmark(Landmark landmark) {
        this.landmark = landmark;
    }
}
