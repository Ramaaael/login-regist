CREATE DATABASE users_signup;

USE users_signup;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    mobile_or_email VARCHAR(255) NOT NULL,
    full_name VARCHAR(255) NOT NULL,
    ussername VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);