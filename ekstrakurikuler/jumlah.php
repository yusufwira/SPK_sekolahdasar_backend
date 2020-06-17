<?php
header("Access-Control-Allow-Origin: *");
require('../connection.php');

$sql = "SELECT count(*) as jumlah from ekstrakurikuler";
$result = $conn->query($sql);
if ($result->num_rows > 0) {		
    $detail_eks = array();
    $i=0;
	while ($obj = $result->fetch_assoc()) {
        $detail_eks[$i]['jumlah'] = addslashes(htmlentities($obj['jumlah']));      
        $i++ ;
    }
    	
    echo json_encode($detail_eks);
	
} else {  
	echo "Unable to process you request, please try again";
	die();
}

?>