<?php
header("Access-Control-Allow-Origin: *");
require('../connection.php');

$nama= $_GET['nama'];
$desc = $_GET['desc'];


$sql = "SELECT * from ekstrakurikuler";
$result = $conn->query($sql);
if ($result->num_rows > 0) {		
	$hasil ="";
	while ($obj = $result->fetch_assoc()) {
        
		if($nama == $obj['nama_eks']){				
            echo json_encode("sudah");
        }
        else{
            $sql2 = "INSERT INTO ekstrakurikuler (nama_eks, keterangan) values ('$nama', '$desc')";
            if ($conn->query($sql2) === TRUE) {
                echo json_encode("Sukses");
            } else {
                 echo json_encode("Error: " . $sql . "<br>" . $conn->error);
            }
        }
		
	}	

	
} else {

    $sql2 = "INSERT INTO ekstrakurikuler (nama_eks, keterangan) values ('$nama', '$desc')";
    if ($conn->query($sql2) === TRUE) {
        echo json_encode("Sukses");
    } else {
        echo json_encode("Error: " . $sql . "<br>" . $conn->error);
    }
	//echo "Unable to process you request, please try again";
	//die();
}

?>