CREATE DATABASE muaz;

USE muaz;

-- Admin table
CREATE TABLE admin (
  id INT AUTO_INCREMENT PRIMARY KEY
  , name VARCHAR(100) NOT NULL
  , password VARCHAR(255) NOT NULL
);

-- Projects table
CREATE TABLE projects (
  id INT AUTO_INCREMENT PRIMARY KEY
  , image VARCHAR(255) NOT NULL
  , github_link VARCHAR(255) NOT NULL
  , live_demo_link VARCHAR(255) NOT NULL
);

-- Contact table
CREATE TABLE contact (
  id INT AUTO_INCREMENT PRIMARY KEY
  , name VARCHAR(100) NOT NULL
  , email VARCHAR(100) NOT NULL
  , description TEXT NOT NULL
);