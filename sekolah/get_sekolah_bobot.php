<?php
header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Headers: *');
require('../connection.php');

    $sql = "SELECT * FROM kriteria";
    $result = $conn->query($sql);
    $j =0;
    if ($result->num_rows > 0) {
      $sekolah_bobot = array();
      while($row = $result->fetch_assoc()) {
        $sql2 = "SELECT sb.kriteria_id, s.nama_sekolah as sekolah_1, s.idinfo_sekolah as idsekolah_1, s2.nama_sekolah as sekolah_2,s2.idinfo_sekolah as idsekolah_2, sb.bobot 
        FROM sekolah_bobot sb INNER JOIN info_sekolah s on sb.sekolah_id_1 = s.idinfo_sekolah INNER JOIN info_sekolah s2 on sb.sekolah_id_2 = s2.idinfo_sekolah 
        WHERE sb.kriteria_id = ".$row['idkriteria']." ORDER by s.idinfo_sekolah";
        $result2 = $conn->query($sql2);
        if ($result2->num_rows > 0) {
            $i=0;
            while($row2 = $result2->fetch_assoc()) {
                if($row2['sekolah_1'] !== $row2['sekolah_2']){
                    $sekolah_bobot[$j][$i]['nama_kriteria'] = addslashes(htmlentities($row['nama_kriteria']));
                    $sekolah_bobot[$j][$i]['kriteria_id'] = addslashes(htmlentities($row2['kriteria_id']));
                    $sekolah_bobot[$j][$i]['idsekolah_1'] = addslashes(htmlentities($row2['idsekolah_1']));
                    $sekolah_bobot[$j][$i]['sekolah_1'] = addslashes(htmlentities($row2['sekolah_1']));
                    $sekolah_bobot[$j][$i]['idsekolah_2'] = addslashes(htmlentities($row2['idsekolah_2']));
                    $sekolah_bobot[$j][$i]['sekolah_2'] = addslashes(htmlentities($row2['sekolah_2']));
                    $sekolah_bobot[$j][$i]['bobot'] = addslashes(htmlentities($row2['bobot']));
                    $i++;
                }
                
            }
            $j++;
            
        } else {
            echo "0 results";
        }
      }
      echo json_encode($sekolah_bobot);
    } else {
      echo "0 results";
    }
?>