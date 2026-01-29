<?php
require_once __DIR__ . '/app/core/Db.php';

try {
    $db = Db::getInstance()->pdo();

    // Create tags table
    $db->exec("CREATE TABLE IF NOT EXISTS tags (
        id int NOT NULL AUTO_INCREMENT, 
        name varchar(100) NOT NULL, 
        icon varchar(100) DEFAULT NULL, 
        created_at timestamp NULL DEFAULT CURRENT_TIMESTAMP, 
        updated_at timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP, 
        PRIMARY KEY (id)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci");

    echo "Table 'tags' created or already exists.\n";

    // Check if tag_id exists
    $columns = $db->query("SHOW COLUMNS FROM posts LIKE 'tag_id'")->fetchAll();
    if (empty($columns)) {
        $db->exec("ALTER TABLE posts ADD COLUMN tag_id INT DEFAULT NULL AFTER is_hidden");
        echo "Column 'tag_id' added to 'posts'.\n";
    }

    // Check if 'Hot' tag exists
    $stmt = $db->prepare("SELECT id FROM tags WHERE name = ?");
    $stmt->execute(['Hot']);
    $tag = $stmt->fetch();

    if (!$tag) {
        $db->exec("INSERT INTO tags (name, icon) VALUES ('Hot', 'fa fa-star text-warning')");
        $tagId = $db->lastInsertId();
        echo "Tag 'Hot' created with ID: $tagId.\n";
    } else {
        $tagId = $tag['id'];
        echo "Tag 'Hot' already exists with ID: $tagId.\n";
    }

    // Migrate is_popular
    $columns = $db->query("SHOW COLUMNS FROM posts LIKE 'is_popular'")->fetchAll();
    if (!empty($columns)) {
        $db->exec("UPDATE posts SET tag_id = $tagId WHERE is_popular = 1");
        echo "Migrated is_popular data to tag_id.\n";

        $db->exec("ALTER TABLE posts DROP COLUMN is_popular");
        echo "Column 'is_popular' dropped from 'posts'.\n";
    }

    echo "Database migration completed successfully.\n";

} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
