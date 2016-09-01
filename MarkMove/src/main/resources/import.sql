USE markmove;

INSERT INTO user (age, email, gender, password_hash, username) VALUES(19, 'hasimsolakov@abv.bg', 'Male', '$2a$10$HSWQhtuUhExI5O9vZkENvOCv33Aqw4aiDznJjOyeYTbeR7i/RYFIe', 'Hashim');
/*Username is Hashim with PASSWORD = 0000;*/
INSERT INTO user (age, email, gender, password_hash, username) VALUES(20, 'toshko.vasilev@yahoo.com', 'Male', '$2a$10$.ileK4xLhSZ7rBRdtVMq3OSn2t3ZLCiuba7yt06rC9arKquY8tzbm', 'Todor');
/*Username is Todor with PASSWORD = 1111; (four 1-s)!*/


INSERT INTO role (name) VALUES('USER');
INSERT INTO role (name) VALUES('PUBLISHER');
INSERT INTO role (name) VALUES('ADMIN');
/*  Run that in your DB - Hibernate does not allow table creating in import.sql
CREATE TABLE `persistent_logins` (
  `username` VARCHAR(64) NOT NULL,
  `series` VARCHAR(64) NOT NULL,
  `token` VARCHAR(64) NOT NULL,
  `last_used` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`series`)
)
  COLLATE='utf8_general_ci'
  ENGINE=InnoDB;
*/
INSERT INTO user_role (user_id, role_id) values (1,3);
INSERT INTO user_role (user_id, role_id) values (2,3);