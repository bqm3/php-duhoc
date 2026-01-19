<?php

class NavbarController
{
    public function getStudyAbroadMenu()
    {
        try {
            $pdo = Db::getInstance()->pdo();

            // Lấy danh sách châu lục
            $stmt = $pdo->query("SELECT id, name, slug FROM continents ORDER BY display_order ASC");
            $continents = $stmt->fetchAll();

            // Lấy danh sách nước theo từng châu lục
            foreach ($continents as &$continent) {
                $stmt = $pdo->prepare("SELECT id, name, slug FROM countries WHERE continent_id = ? ORDER BY display_order ASC");
                $stmt->execute([$continent['id']]);
                $continent['countries'] = $stmt->fetchAll();
            }

            header('Content-Type: application/json');
            echo json_encode($continents);
            exit;
        } catch (Exception $e) {
            header('HTTP/1.1 500 Internal Server Error');
            header('Content-Type: application/json');
            echo json_encode(['error' => $e->getMessage()]);
            exit;
        }
    }
}
