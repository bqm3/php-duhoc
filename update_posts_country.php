<?php
require_once 'app/core/Db.php';

try {
    $pdo = Db::getInstance()->pdo();
    
    // Add country_id column if not exists
    $stmt = $pdo->prepare("SHOW COLUMNS FROM posts LIKE 'country_id'");
    $stmt->execute();
    if (!$stmt->fetch()) {
        // Adding country_id after category_id
        $pdo->exec("ALTER TABLE posts ADD COLUMN country_id INT NULL AFTER category_id");
        echo "Column 'country_id' added to 'posts' table.<br>";
        
        // Optional: Add foreign key constraint if you want strict integrity
        // $pdo->exec("ALTER TABLE posts ADD CONSTRAINT fk_posts_country FOREIGN KEY (country_id) REFERENCES countries(id) ON DELETE SET NULL");
    } else {
        echo "Column 'country_id' already exists.<br>";
    }

    echo "Database updated successfully.";

} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
