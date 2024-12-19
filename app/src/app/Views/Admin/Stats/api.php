<?php

$servername = "host";
$username = "urbantree";
$password = "J0HMXAJ6XE";
$dbname = "urbantree";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

function obtenir_dades($conn, $task_type) {
    $sql = "SELECT * FROM $task_type";
    $result = $conn->query($sql);

    $data = array();
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
    }
    return $data;
}

// ...existing code...
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['endpoint'])) {
        if ($_GET['endpoint'] === 'dades1') {
            $data = obtenir_dades($conn, 'task_types');
            $response = array_map(function($item) {
                return ['valor' => $item['hours']];
            }, $data);
            echo json_encode($response);
        } elseif ($_GET['endpoint'] === 'dades2') {
            $data = obtenir_dades($conn, 'work_orders_users');
            $response = array_map(function($item) {
                return ['valor' => $item['user_id']];
            }, $data);
            echo json_encode($response);
        } elseif ($_GET['endpoint'] === 'dades3') {
            $data = obtenir_dades($conn, 'work_reports');
            $response = array_map(function($item) {
                return ['valor' => $item['spent_fuel']];
            }, $data);
            echo json_encode($response);
        } else {
            http_response_code(404);
            echo json_encode(array("message" => "Endpoint no encontrado"));
        }
    } else {
        http_response_code(400);
        echo json_encode(array("message" => "Endpoint no especificado"));
    }
}
// ...existing code...

$conn->close();
?>