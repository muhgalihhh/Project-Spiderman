CREATE DATABASE db_spiderman;

USE db_spiderman;

CREATE TABLE
    user (
        id INT PRIMARY KEY AUTO_INCREMENT,
        username VARCHAR(50) NOT NULL,
        password VARCHAR(255) NOT NULL,
        role VARCHAR(20) NOT NULL
    );

CREATE TABLE
    film (
        id_film INT PRIMARY KEY AUTO_INCREMENT,
        judul VARCHAR(100) NOT NULL,
        MC VARCHAR(50),
        deskripsi TEXT,
        link_trailer VARCHAR(255),
        link_film VARCHAR(255),
        gambar VARCHAR(255)
    );

CREATE TABLE
    favorite (
        id_favorite INT PRIMARY KEY AUTO_INCREMENT,
        id_user INT,
        id_film INT,
        FOREIGN KEY (id_user) REFERENCES user (id),
        FOREIGN KEY (id_film) REFERENCES film (id_film)
    );