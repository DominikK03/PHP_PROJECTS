CREATE DATABASE IF NOT EXISTS diary;
USE diary;

CREATE TABLE diary (
                       id INT AUTO_INCREMENT PRIMARY KEY,
                       date DATE NOT NULL,
                       name VARCHAR(255) NOT NULL,
                       description TEXT NOT NULL
);