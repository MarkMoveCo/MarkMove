package com.markmove.services.publication;

import com.markmove.models.Publication;

import java.awt.print.Pageable;

public interface PublicationService {
    Publication create(Publication publication);
    Iterable<Publication> findLatestPublications(Pageable pageable);
}
