<?php
header("Access-Control-Allow-Origin: *");
require('../connection.php');

$idsekolah = $_POST['idsekolah'];
$validasi = $_POST['validasi'];

$sql = "UPDATE info_sekolah  SET status_sekolah = '$validasi' WHERE idinfo_sekolah = $idsekolah";

if ($conn->query($sql) === TRUE) {
  echo json_encode('sukses');
} else {
  echo json_encode("Error updating record: ".$sql . $conn->error);
}

?>