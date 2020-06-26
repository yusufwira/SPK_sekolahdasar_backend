<?php
header("Access-Control-Allow-Origin: *");
require('../connection.php');

$nama= $_GET['nama'];


$sql = "SELECT * from kriteria";
$result = $conn->query($sql);
if ($result->num_rows > 0) {		
    $hasil ="";
    $check = false;
    $arr_temp =[];
	while ($obj = $result->fetch_assoc()) {        
		if($nama == $obj['nama_kriteria']){				  
            $check = true;
        }
        $arr_temp[] = $obj['idkriteria'];	
    }	
    
    if($check == true){
        echo json_encode("sudah");
    }
    else{
        $sql2 = "INSERT INTO kriteria (nama_kriteria) values ('$nama')";
        if ($conn->query($sql2) === TRUE) {
            $last_id = $conn->insert_id;
            $sql3 = "INSERT INTO kriteria_bobot (kriteria_1,kriteria_2,bobot) values ($last_id,$last_id,1)";
            $conn->query($sql3);
            for ($i=0; $i < sizeof($arr_temp); $i++) { 
                $sql4 = "INSERT INTO kriteria_bobot (kriteria_1,kriteria_2,bobot) values ($last_id,$arr_temp[$i],1)";
                $conn->query($sql4);
            }
            echo json_encode($arr_temp);
        } else {
             echo json_encode("Error: " . $sql . "<br>" . $conn->error);
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