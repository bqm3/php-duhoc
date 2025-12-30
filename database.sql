CREATE DATABASE IF NOT EXISTS dulich CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE dulich;

CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  email VARCHAR(190) NOT NULL UNIQUE,
  password_hash VARCHAR(255) NOT NULL,
  role ENUM('admin','user', 'staff') NOT NULL DEFAULT 'user',
  is_deleted TINYINT NOT NULL default 0,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
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
  'staff@local.com',
  '$2b$10$MCx2Zt0JOwm8XaIvp7f2Vek2xvPvTsc3RcKiLB2kCNcO.KTCB6HIu',
  'staff'
);

INSERT INTO users(email,password_hash,role)
VALUES(
  'admin@local.com',
  '$2b$10$MCx2Zt0JOwm8XaIvp7f2Vek2xvPvTsc3RcKiLB2kCNcO.KTCB6HIu',
  'admin'
);