<?php
header("Access-Control-Allow-Origin: *");
require('../connection.php');

$sql = "SELECT * from ekstrakurikuler";
$result = $conn->query($sql);
if ($result->num_rows > 0) {		
    $detail_eks = array();
    $i=0;
	while ($obj = $result->fetch_assoc()) {
        $detail_eks[$i]['id'] = addslashes(htmlentities($obj['idekstrakurikuler']));
        $detail_eks[$i]['nama_eks'] = addslashes(htmlentities($obj['nama_eks']));
        $detail_eks[$i]['keterangan'] = addslashes(htmlentities($obj['keterangan']));
        $i++ ;
    }
    	
    echo json_encode($detail_eks);
	
} else {  
	echo "Unable to process you request, please try again";
	die();
}


?>