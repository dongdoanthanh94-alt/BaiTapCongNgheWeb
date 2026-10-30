CREATE DATABASE IF NOT EXISTS tintuc CHARACTER SET utf8 COLLATE utf8_general_ci;
USE tintuc;

CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(50) NOT NULL,
    fullname VARCHAR(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO users (username, password, fullname)
VALUES ('admin', '123456', 'Quản trị viên')
ON DUPLICATE KEY UPDATE username = username;
