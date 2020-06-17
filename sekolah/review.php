<?php
header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Headers: *');
require('../connection.php');

$id_sekolah=$_GET['id_sekolah'];
$id_users=$_GET['id_user'];
$review=$_GET['review'];
 

$sql2 = "INSERT INTO review (isi_review, info_sekolah_idinfo_sekolah, users_id_users)
VALUES ('$review',$id_sekolah,$id_users)";
if ($conn->query($sql2) === TRUE) {
echo json_encode("Sukses");
} else {
echo json_encode("Error: " . $sql2 . "<br>" . $conn->error);
}

$conn->close();
?>