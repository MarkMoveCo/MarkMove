USE markmove;

INSERT INTO user (age, email, gender, password_hash, username) VALUES(19, 'hasimsolakov@abv.bg', 'Male', '$2a$10$HSWQhtuUhExI5O9vZkENvOCv33Aqw4aiDznJjOyeYTbeR7i/RYFIe', 'Hashim');
INSERT INTO user (age, email, gender, password_hash, username) VALUES(20, 'toshko.vasilev@yahoo.com', 'Male', '$2a$10$.ileK4xLhSZ7rBRdtVMq3OSn2t3ZLCiuba7yt06rC9arKquY8tzbm', 'Todor');
/*Username is Todor with PASSWORD = 1111; (four 1-s)!*/

INSERT INTO role (name) VALUES('USER');
INSERT INTO role (name) VALUES('PUBLISHER');
INSERT INTO role (name) VALUES('ADMIN');

INSERT INTO user_role (user_id, role_id) values (1,3);
INSERT INTO user_role (user_id, role_id) values (2,3);