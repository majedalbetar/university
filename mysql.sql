CREATE DATABASE labproject;
USE labproject;

CREATE TABLE students (
  id INT AUTO_INCREMENT PRIMARY KEY,
  fname VARCHAR(255),
  email VARCHAR(255),
  gender ENUM('Male', 'Famle')
);

