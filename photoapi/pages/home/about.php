<?php
require '../../credentials/config.php';
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    try {
        $stmt = $conn->query('SELECT * FROM home WHERE session = "about" limit 1');
        $tasks = $stmt->fetchAll(PDO::FETCH_ASSOC);
        header('Content-Type: application/json');
        $tasks[0]['text'] = nl2br($tasks[0]['text']); 
        echo json_encode($tasks[0]);
    } catch (PDOException $e) {
        echo json_encode(['error' => $e->getMessage()]);
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'PUT') {
    // Tratamento para requisições PUT

    try {
        $data = json_decode(file_get_contents('php://input'), true);
        $stmt = $conn->prepare('UPDATE home SET text = :text WHERE session = "about"');
        $stmt->bindParam(':text', $data['text']);
        $stmt->execute();
        header('Content-Type: application/json');
        echo json_encode(['success' => 'Sobre alterado com sucesso!']);
    } catch (PDOException $e) {
        echo json_encode(['error' => $e->getMessage()]);
    }
}
