CREATE DATABASE IF NOT EXISTS dulich CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE dulich;

CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,

  -- Thông tin đăng nhập
  email VARCHAR(190) NOT NULL UNIQUE,
  password_hash VARCHAR(255) NOT NULL,

  -- Thông tin cá nhân
  full_name VARCHAR(150) NOT NULL,
  gender ENUM('male','female','other') DEFAULT 'other',
  birth_date DATE NULL,
  phone VARCHAR(20) NULL,

  -- Phân quyền & trạng thái
  role ENUM('admin','staff') NOT NULL DEFAULT 'staff',
  is_deleted TINYINT(1) NOT NULL DEFAULT 0,

  -- Audit
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);
CREATE TABLE IF NOT EXISTS posts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    slug VARCHAR(255) UNIQUE NOT NULL,
    title VARCHAR(255) NOT NULL,
    category_id INT,
    content LONGTEXT,
    count_view INT DEFAULT 0,
    count_share INT DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    INDEX idx_slug (slug),
    INDEX idx_category (category_id)
);

CREATE TABLE IF NOT EXISTS categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    slug VARCHAR(100) UNIQUE NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
-- Tạo admin mặc định (pass: 123456@)
INSERT INTO users(email, password_hash, full_name, gender, birth_date, phone, role)
VALUES(
  'staff@local.com',
  '$2b$10$MCx2Zt0JOwm8XaIvp7f2Vek2xvPvTsc3RcKiLB2kCNcO.KTCB6HIu',
  'Nguyễn Văn A',
 'male',
 '1995-08-20',
 '0989123456',
  'staff'
);

INSERT INTO users(email, password_hash, full_name, gender, birth_date, phone, role)
VALUES(
  'admin@local.com',
  '$2b$10$MCx2Zt0JOwm8XaIvp7f2Vek2xvPvTsc3RcKiLB2kCNcO.KTCB6HIu',
  'ADMIN',
 'male',
 '1995-08-20',
 '0989123456',
  'admin'
);