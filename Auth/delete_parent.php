<?php
header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Headers: *');
require('../connection.php');

$id_users= $_GET['id_users'];
//echo json_encode($id_users);
$sql = "DELETE FROM users WHERE id_users =".$id_users;
if ($conn->query($sql) === TRUE) {
    echo json_encode("Record deleted successfully");
} else {
    echo json_encode("Error deleting record: " . $conn->error);
}

$conn->close();


?>