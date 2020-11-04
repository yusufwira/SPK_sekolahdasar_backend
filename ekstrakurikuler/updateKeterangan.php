<?php

header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Headers: *');
require('../connection.php');

$idEkskul = $_GET['id'];
$keterangan = $_GET['keterangan'];

$sql2 = "UPDATE ekstrakurikuler SET keterangan='$keterangan' WHERE idekstrakurikuler=$idEkskul";
if ($conn->query($sql2) === TRUE) {
echo json_encode("Sukses");
} else {
echo json_encode("Error: " . $sql2 . "<br>" . $conn->error);
}

$conn->close();
?>