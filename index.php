<?php
include 'db_config.php';

header('Content-Type: application/json');

switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        $sql = "SELECT * FROM users";
        $result = $conn->query($sql);
        $users = [];

        while($row = $result->fetch_assoc()) {
            $users[] = $row;
        }
        echo json_encode(['products' => $users]);
        break;

    case 'POST':
        $data = json_decode(file_get_contents("php://input"));
        $stmt = $conn->prepare("INSERT INTO users (id, fname, lname, username, email, avatar) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("isssss", $data->id, $data->fname, $data->lname, $data->username, $data->email, $data->avatar);
        $stmt->execute();
        echo json_encode(['message' => 'User added successfully']);
        break;

    case 'PUT':
        $data = json_decode(file_get_contents("php://input"));
        $stmt = $conn->prepare("UPDATE users SET fname=?, lname=?, username=?, email=? WHERE id=?");
        $stmt->bind_param("ssssi", $data->fname, $data->lname, $data->username, $data->email, $data->id);
        $stmt->execute();
        echo json_encode(['message' => 'User updated successfully']);
        break;

    case 'DELETE':
        $data = json_decode(file_get_contents("php://input"));
        $stmt = $conn->prepare("DELETE FROM users WHERE id=?");
        $stmt->bind_param("i", $data->id);
        $stmt->execute();
        echo json_encode(['message' => 'User deleted successfully']);
        break;
}
?>
