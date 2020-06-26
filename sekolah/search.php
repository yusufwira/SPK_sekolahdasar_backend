<?php
header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Headers: *');
require('../connection.php');

$key = $_GET['key'];
$sql = "SELECT * FROM users u INNER JOIN info_sekolah s on u.id_users= s.users_id_users INNER JOIN foto_sekolah f on s.idinfo_sekolah = f.info_sekolah_idinfo_sekolah WHERE s.nama_sekolah like '%$key%' GROUP by s.idinfo_sekolah";
$result = $conn->query($sql);
if ($result->num_rows > 0) {		
    $list_sekolah = array();
    $i=0;
	while ($obj = $result->fetch_assoc()) {
        $list_sekolah[$i]['idinfo_sekolah'] = addslashes(htmlentities($obj['idinfo_sekolah']));
        $list_sekolah[$i]['nama_sekolah'] = addslashes(htmlentities($obj['nama_sekolah']));
        $list_sekolah[$i]['alamat_sekolah'] = addslashes(htmlentities($obj['alamat_sekolah'])); 
        $list_sekolah[$i]['notelp_sekolah'] = addslashes(htmlentities($obj['notelp_sekolah']));   
        $list_sekolah[$i]['username'] = addslashes(htmlentities($obj['username']));  
        $list_sekolah[$i]['nama_foto'] = addslashes(htmlentities($obj['nama_foto'])); 
        $list_sekolah[$i]['extention'] = addslashes(htmlentities($obj['extention']));    
        $list_sekolah[$i]['jumlah'] = $result->num_rows ;
        $sql2 = "SELECT r.rating FROM rating r WHERE r.info_sekolah_id = ".$obj['idinfo_sekolah'];
        $result2 = $conn->query($sql2);
        if ($result2->num_rows > 0) {		          
            $j=0;
            while ($obj2 = $result2->fetch_assoc()) {
                $j += addslashes(htmlentities($obj2['rating']));                
            }
            $jumlah_like = round($j/$result->num_rows,1);
                
            $list_sekolah[$i]['jumlah_like'] = $jumlah_like ;            
        }
        else{
            $list_sekolah[$i]['jumlah_like'] = 0;
        }
        $sql3 = "SELECT COUNT(*) as jumlah_komen FROM review r WHERE r.info_sekolah_idinfo_sekolah = ".$obj['idinfo_sekolah'];
        $result3 = $conn->query($sql3);
        if ($result3->num_rows > 0) {		          
            $jumlah_komen = 0;
            while ($obj3 = $result3->fetch_assoc()) {
                $jumlah_komen = addslashes(htmlentities($obj3['jumlah_komen']));                
            }  
            $list_sekolah[$i]['jumlah_komeh'] = $jumlah_komen;                   
        }
        else{
            $list_sekolah[$i]['jumlah_komeh'] = 0;
        }
        $i++ ;
    }
    
    	
    echo json_encode($list_sekolah);
	
} else {  
	echo "Unable to process you request, please try again";
	die();
}


?>