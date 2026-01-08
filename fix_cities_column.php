<?php
require_once 'app/core/Db.php';

try {
    $pdo = Db::getInstance()->pdo();
    
    // Check if category_id exists
    $stmt = $pdo->prepare("SHOW COLUMNS FROM cities LIKE 'category_id'");
    $stmt->execute();
    if ($stmt->fetch()) {
        // Rename column
        $pdo->exec("ALTER TABLE cities CHANGE COLUMN category_id country_id INT NULL");
        echo "Column renamed from 'category_id' to 'country_id'.<br>";
        
        // Update index/FK if necessary (Assuming previous index was idx_category)
        // $pdo->exec("ALTER TABLE cities DROP INDEX idx_category, ADD INDEX idx_country (country_id)");
    } else {
        echo "Column 'category_id' not found (maybe already renamed).<br>";
    }

    echo "Database updated successfully.";

} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
