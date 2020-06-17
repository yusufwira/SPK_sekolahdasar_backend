<?php
header("Access-Control-Allow-Origin: *");
require('../connection.php');

$nama= $_GET['nama'];


$sql = "SELECT * from kriteria";
$result = $conn->query($sql);
if ($result->num_rows > 0) {		
	$hasil ="";
	while ($obj = $result->fetch_assoc()) {
        
		if($nama == $obj['nama_kriteria']){				
            echo json_encode("sudah");
        }
        else{
            $sql2 = "INSERT INTO kriteria (nama_kriteria) values ('$nama')";
            if ($conn->query($sql2) === TRUE) {
                echo json_encode("Sukses");
            } else {
                 echo json_encode("Error: " . $sql . "<br>" . $conn->error);
            }
        }
		
	}	

	
} else {

    $sql2 = "INSERT INTO kriteria (nama_kriteria) values ('$nama')";
    if ($conn->query($sql2) === TRUE) {
        echo json_encode("Sukses");
    } else {
        echo json_encode("Error: " . $sql . "<br>" . $conn->error);
    }
	//echo "Unable to process you request, please try again";
	//die();
}

?>