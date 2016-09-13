package com.markmove.models;

import javax.persistence.*;
import java.time.LocalDateTime;

@Entity
@Table(name = "publication")
public class Publication {

    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    private Long id;

    @Column(nullable = false, length = 250)
    private String title;

    @Lob
    @Column(nullable = false)
    private String body;


    @ManyToOne
    private User author;

    /**
     * Time of creation of the Publication
     */
    @Column(nullable = false)
    private LocalDateTime createdOn = LocalDateTime.now();


    public Long getId() {
        return id;
    }

    public void setId(Long id) {
        this.id = id;
    }

    public String getTitle() {
        return title;
    }

    public void setTitle(String title) {
        this.title = title;
    }

    public String getBody() {
        return body;
    }

    public void setBody(String body) {
        this.body = body;
    }

    public User getAuthor() {
        return author;
    }

    public void setAuthor(User author) {
        this.author = author;
    }
}
