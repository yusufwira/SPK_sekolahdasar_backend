<?php
header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Headers: *');
require('../connection.php');

$idEks= $_GET['id_eks'];
$idSekolah= $_GET['id_sekolah'];
// sql to delete a record
$sql = "DELETE FROM ekstrakurikuler_has_info_sekolah WHERE ekstrakurikuler_idekstrakurikuler=".$idEks." AND info_sekolah_idinfo_sekolah=".$idSekolah;

if ($conn->query($sql) === TRUE) {
    echo json_encode("sukses");
} else {
    echo json_encode("Error deleting record: " . $conn->error);
}

$conn->close();


?>