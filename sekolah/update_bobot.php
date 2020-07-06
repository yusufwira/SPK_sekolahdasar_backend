<?php
header("Access-Control-Allow-Origin: *");
require('../connection.php');

$bobot = $_POST['bobot'];
$crit = $_POST['crit'];
$sekolah_1 = $_POST['sekolah_1'];
$sekolah_2 = $_POST['sekolah_2'];

$sql = "UPDATE sekolah_bobot s SET bobot=$bobot WHERE s.kriteria_id = $crit AND s.sekolah_id_1 = $sekolah_1 AND s.sekolah_id_2 = $sekolah_2";

if ($conn->query($sql) === TRUE) {
  echo json_encode('sukses');
} else {
  echo json_encode("Error updating record: ".$sql . $conn->error);
}

?>