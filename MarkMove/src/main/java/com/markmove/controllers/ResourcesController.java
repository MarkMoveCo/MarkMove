package com.markmove.controllers;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.core.io.ResourceLoader;
import org.springframework.http.ResponseEntity;
import org.springframework.stereotype.Controller;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestMethod;
import org.springframework.web.bind.annotation.ResponseBody;

import java.nio.file.Paths;

@Controller
public class ResourcesController {

    @Autowired
    private ResourceLoader resourceLoader;

    @RequestMapping(method = RequestMethod.GET, value = "/images/uploaded_images/{filename:.+}")
    @ResponseBody
    public ResponseEntity<?> getFile(@PathVariable String filename) {
        // Paths.get Should be Constant or somehow made with variables
        try {
            return ResponseEntity.ok(resourceLoader.getResource("file:" + Paths.get("src/main/resources/public/images/uploaded_images", filename).toString()));
        } catch (Exception e) {
            return ResponseEntity.notFound().build();
        }
    }

}
