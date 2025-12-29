CREATE DATABASE IF NOT EXISTS dulich CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE dulich;

CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  email VARCHAR(190) NOT NULL UNIQUE,
  password_hash VARCHAR(255) NOT NULL,
  role ENUM('admin','user') NOT NULL DEFAULT 'admin',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE posts (
  id INT AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(255) NOT NULL,
  content MEDIUMTEXT NULL,
  status ENUM('draft','published') NOT NULL DEFAULT 'draft',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Tạo admin mặc định (pass: Admin@123)
INSERT INTO users(email,password_hash,role)
VALUES(
  'admin@local.com',
  '$2y$10$wJ4w6qg0QzR6lG6b8v7y7OQH9cN3o6mYwQ2qk8hJxj8pQeXkQv9oK',
  'admin'
);
