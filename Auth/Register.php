<?php 
header("Access-Control-Allow-Origin: *");
require('../connection.php');

$username = $_GET['username'];
$pass = $_GET['password'];
$password = md5($pass);
$email_user = $_GET['email'];
$nama_user = $_GET['nama'];
$alamat_user = $_GET['alamat'];
$kecamatan = $_GET['kecamatan'];
$notelp_user = $_GET['notelp'];
$photo = $_GET['photo'];
$hak_akses = $_GET['hak'];




$sql = "INSERT INTO users (username, password, hak_akses, nama_user, alamat_user, kecamatan, notelp_user, email_user,photo)
VALUES ('$username','$password','$hak_akses','$nama_user','$alamat_user','$kecamatan','$notelp_user','$email_user','$photo')";

if ($conn->query($sql) === TRUE) {
    echo json_encode("Sukses");
} else {
     echo json_encode("Error: " . $sql . "<br>" . $conn->error);
}


$conn->close();

 ?>