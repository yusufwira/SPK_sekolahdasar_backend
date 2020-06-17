<?php
header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Headers: *');
require('../connection.php');

$username=$_POST['username'];

$file = $_FILES['file_upload'];

$namaFile = $_FILES['file_upload']['name'];
$ext = pathinfo($namaFile, PATHINFO_EXTENSION);
$name = pathinfo($namaFile, PATHINFO_FILENAME );
$namaSementara = $_FILES['file_upload']['tmp_name'];

// tentukan lokasi file akan dipindahkan
if(!is_dir("image/".$username)) {
    mkdir("image/".$username);
}
//$dirUpload = mkdir("profile/".$iduser);
$direct = "image/".$username."/"; 

// // pindahkan file
 $terupload = move_uploaded_file($namaSementara, $direct.$namaFile);

if ($terupload) {
    $files = array();
    $files['link'] =  "http://localhost/ta_backend/sekolah/".$direct.$namaFile;
    $files['ext'] =  $ext;
    $files['name'] =  $name;
    echo json_encode( $files);      
} else {
    echo json_encode ( "Upload Gagal!");
}

?>