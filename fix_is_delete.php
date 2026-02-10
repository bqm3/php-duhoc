<?php
require_once __DIR__ . '/app/core/Db.php';

try {
    $db = Db::getInstance()->pdo();
    $tables = $db->query("SHOW TABLES")->fetchAll(PDO::FETCH_COLUMN);

    foreach ($tables as $table) {
        echo "Checking table: $table\n";
        $columns = $db->query("SHOW COLUMNS FROM `$table`")->fetchAll(PDO::FETCH_COLUMN);

        if (in_array('is_dele', $columns)) {
            $db->exec("ALTER TABLE `$table` CHANGE `is_dele` `is_delete` TINYINT(1) DEFAULT 0");
            echo "  - Renamed 'is_dele' to 'is_delete'\n";
        } elseif (!in_array('is_delete', $columns)) {
            $db->exec("ALTER TABLE `$table` ADD `is_delete` TINYINT(1) DEFAULT 0");
            echo "  - Added 'is_delete'\n";
        } else {
            echo "  - Already has 'is_delete'\n";
        }
    }
    echo "Database schema updated successfully.\n";
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
