package com.markmove.repositories;

import com.markmove.models.Publication;
import org.springframework.data.jpa.repository.JpaRepository;

import java.awt.print.Pageable;

public interface PublicationRepository extends JpaRepository<Publication, Long> {
    Iterable<Publication> findTopByOrderByCreatedOnDesc(Pageable pageable);
}
