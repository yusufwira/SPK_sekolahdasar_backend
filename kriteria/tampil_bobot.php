<?php
header("Access-Control-Allow-Origin: *");
require('../connection.php');

$sql = "SELECT k.nama_kriteria as kriteria_1,k.idkriteria as idkriteria_1, k2.nama_kriteria  as kriteria_2,k2.idkriteria  as idkriteria_2, kb.bobot FROM kriteria_bobot kb  INNER JOIN kriteria k on kb.kriteria_1 = k.idKriteria INNER JOIN kriteria k2 on kb.kriteria_2 = k2.idKriteria ORDER by k.idkriteria";
$result = $conn->query($sql);
if ($result->num_rows > 0) {		
    $tampil = array();
    $i=0;
	while ($obj = $result->fetch_assoc()) {
        if($obj['kriteria_1'] != $obj['kriteria_2']){
            $tampil[$i]['idkriteria_1'] = addslashes(htmlentities($obj['idkriteria_1']));
            $tampil[$i]['idkriteria_2'] = addslashes(htmlentities($obj['idkriteria_2']));
            $tampil[$i]['kriteria_1'] = addslashes(htmlentities($obj['kriteria_1']));
            $tampil[$i]['kriteria_2'] = addslashes(htmlentities($obj['kriteria_2']));
            $tampil[$i]['bobot'] = addslashes(htmlentities($obj['bobot']));    
            $i++ ;
        }        
    }
    	
    echo json_encode($tampil);
	
} else {  
	echo "Unable to process you request, please try again";
	die();
}


?>