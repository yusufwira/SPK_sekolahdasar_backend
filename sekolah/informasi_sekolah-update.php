<?php
header("Access-Control-Allow-Origin: *");
require('../connection.php');

$id = $_POST['id'];
$kolom = $_POST['kolom'];
$value = $_POST['value'];

//echo json_encode($id.$kolom.$value);

$sql = "UPDATE info_sekolah SET $kolom = '$value' WHERE idinfo_sekolah = $id";

if ($conn->query($sql) === TRUE) {
  echo json_encode('sukses');
} else {
  echo json_encode("Error updating record: ".$sql . $conn->error);
}

?>