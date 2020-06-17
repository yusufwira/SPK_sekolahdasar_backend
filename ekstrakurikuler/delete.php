<?php
header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Headers: *');
require('../connection.php');

$id= $_GET['id'];
// sql to delete a record
$sql = "DELETE FROM ekstrakurikuler WHERE idekstrakurikuler=".$id;

if ($conn->query($sql) === TRUE) {
    echo json_encode("Record deleted successfully");
} else {
    echo json_encode("Error deleting record: " . $conn->error);
}

$conn->close();


?>