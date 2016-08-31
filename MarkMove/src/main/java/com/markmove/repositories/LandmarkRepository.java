package com.markmove.repositories;

import com.markmove.models.Landmark;
import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.data.jpa.repository.Query;
import org.springframework.data.repository.PagingAndSortingRepository;
import org.springframework.stereotype.Repository;

import java.util.List;

@Repository
public interface LandmarkRepository extends PagingAndSortingRepository<Landmark, Long> {
    List<Landmark> findTop5ByOrderByRatingDescNameAsc();

}
