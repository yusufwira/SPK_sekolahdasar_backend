<?php
header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Headers: *');
require('../connection.php');

$idSekolah = $_GET['id_sekolah'];

$sql = "SELECT r.rating FROM rating r WHERE r.info_sekolah_id = ".$idSekolah;

$result = $conn->query($sql);
if ($result->num_rows > 0) {		
    $arr_data = array();
    $i=0;
	while ($obj = $result->fetch_assoc()) {
        $i += addslashes(htmlentities($obj['rating']));                
    }
    $arr_data['hasil'] = $i;
    $arr_data['jumlah'] = $result->num_rows;
    	
    echo json_encode($arr_data);
	
} else {  
	echo "Unable to process you request, please try again";
	die();
}


?>