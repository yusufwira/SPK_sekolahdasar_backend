<?php


header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Headers: *');
require('../connection.php');

$nama = $_POST['nama'];
$ext = $_POST['ext'];
$idSekolah = $_POST['idSekolah'];
// echo json_encode($nama);die();
$hasil = "";
for($i=1; $i< sizeof($nama); $i++){
    $nama_e = $nama[$i];
    $ext_e = $ext[$i];
    $sql = "INSERT INTO foto_sekolah (nama_foto,extention,info_sekolah_idinfo_sekolah)
    VALUES ('$nama_e','$ext_e',$idSekolah)";
    // echo $sql;
    if ($conn->query($sql) === TRUE) {
        $hasil =  "sukses";
    } else {
        $hasil ="Error: " . $sql . "<br>" . $conn->error;
    }
       
}

// echo json_encode($hasil);

$conn->close();
//$input = json_decode($inputJSON, TRUE);


?>