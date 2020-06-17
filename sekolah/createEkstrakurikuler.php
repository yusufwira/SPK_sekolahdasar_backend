<?php


header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Headers: *');
require('../connection.php');

$idEkstra = $_POST['idEkstra'];
$idSekolah = $_POST['idSekolah'];
//echo json_encode(sizeof($idEkstra). $idSekolah);
$hasil="";
for($i = 0; $i<sizeof($idEkstra); $i++){
    $sql = "INSERT INTO ekstrakurikuler_has_info_sekolah (	ekstrakurikuler_idekstrakurikuler,info_sekolah_idinfo_sekolah)
    VALUES ($idEkstra[$i],$idSekolah)";

    if ($conn->query($sql) === TRUE) {
        $hasil = "Sukses";
    } else {
        $hasil = "Error: " . $sql . "<br>" . $conn->error;
    }
}

echo json_encode($hasil);




$conn->close();

?>