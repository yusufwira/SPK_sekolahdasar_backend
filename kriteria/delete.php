<?php
header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Headers: *');
require('../connection.php');

$id= $_GET['id'];
$sql = "DELETE FROM kriteria WHERE idkriteria =".$id;
if ($conn->query($sql) === TRUE) {
    echo json_encode("Record deleted successfully");
} else {
    echo json_encode("Error deleting record: " . $conn->error);
}

$conn->close();


?>