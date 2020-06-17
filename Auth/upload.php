<?php
header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Headers: *');
require('../connection.php');


$username=$_POST['username'];


$file = $_FILES['file_upload'];

$namaFile = $_FILES['file_upload']['name'];
$namaSementara = $_FILES['file_upload']['tmp_name'];

// tentukan lokasi file akan dipindahkan
if(!is_dir("profile/".$username)) {
    mkdir("profile/".$username);
}
//$dirUpload = mkdir("profile/".$iduser);
$direct = "profile/".$username."/"; 

// // pindahkan file
 $terupload = move_uploaded_file($namaSementara, $direct.$namaFile);

if ($terupload) {
    $files = array();
    $files['link'] =  "http://localhost/ta_backend/Auth/".$direct.$namaFile;
    $files['namafile'] =  $namaFile;
    echo json_encode( $files);
    //echo json_encode($direct.$namaFile);
    
} else {
    echo json_encode ( "Upload Gagal!");
}



?>