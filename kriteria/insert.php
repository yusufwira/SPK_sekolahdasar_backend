<?php
header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Headers: *');
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

            $sql_sekolah = "SELECT * FROM info_sekolah";
            $result_infosekolah = $conn->query($sql_sekolah);
            $id_sekolah = array();
            $z =0;
            while ($sekolah = $result_infosekolah->fetch_assoc()){
                $id_sekolah[$z] = $sekolah['idinfo_sekolah'];
                $z++;
            }
            for ($i=0; $i < sizeof($id_sekolah); $i++) { 
                for ($j=0; $j <= $i; $j++) { 
                    $sql_sbobot = "INSERT INTO sekolah_bobot (kriteria_id, sekolah_id_1, sekolah_id_2, bobot) VALUES (".$last_id.",". $id_sekolah[$i].",". $id_sekolah[$j].",1)";
                    if ($conn->query($sql_sbobot) === TRUE) {
                        $test = "Sukses";
                    } else {
                        $test = "Error: " . $sql_sbobot . "<br>" . $conn->error;
                    }
                }
            }
            

            echo json_encode($test);
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