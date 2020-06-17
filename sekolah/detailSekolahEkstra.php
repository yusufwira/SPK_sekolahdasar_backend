<?php
header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Headers: *');
require('../connection.php');

$idSekolah = $_GET['id_sekolah'];

$sql = "SELECT * FROM ekstrakurikuler e INNER JOIN ekstrakurikuler_has_info_sekolah es on e.idekstrakurikuler=es.ekstrakurikuler_idekstrakurikuler WHERE es.info_sekolah_idinfo_sekolah =".$idSekolah;

$result = $conn->query($sql);
if ($result->num_rows > 0) {		
    $list_sekolah = array();
    $i=0;
	while ($obj = $result->fetch_assoc()) {
        $list_sekolah[$i]['id'] = addslashes(htmlentities($obj['idekstrakurikuler']));
        $list_sekolah[$i]['nama'] = addslashes(htmlentities($obj['nama_eks']));
        $list_sekolah[$i]['ket'] = addslashes(htmlentities($obj['keterangan']));    
        $i++ ;
    }
    	
    echo json_encode($list_sekolah);
	
} else {  
	echo "Unable to process you request, please try again";
	die();
}


?>