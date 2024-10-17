<?php
require '../../credentials/config.php';
$var = $_GET['contact'];
if($var == 'whatsapp'){
    try {
        $stmt = $conn->query('SELECT * FROM home WHERE session = "whatsapp" limit 1');
        $tasks = $stmt->fetchAll(PDO::FETCH_ASSOC);
        header('Content-Type: application/json');
        echo json_encode($tasks[0]);
    } catch(PDOException $e) {
        echo json_encode(['error' => $e->getMessage()]);
    }
}
if($var == 'insta'){
    try {
        $stmt = $conn->query('SELECT * FROM home WHERE session = "insta" limit 1');
        $tasks = $stmt->fetchAll(PDO::FETCH_ASSOC);
        header('Content-Type: application/json');
        echo json_encode($tasks[0]);
    } catch(PDOException $e) {
        echo json_encode(['error' => $e->getMessage()]);
    }
}
if($var == 'face'){
    try {
        $stmt = $conn->query('SELECT * FROM home WHERE session = "face" limit 1');
        $tasks = $stmt->fetchAll(PDO::FETCH_ASSOC);
        header('Content-Type: application/json');
        echo json_encode($tasks[0]);
    } catch(PDOException $e) {
        echo json_encode(['error' => $e->getMessage()]);
    }
}
