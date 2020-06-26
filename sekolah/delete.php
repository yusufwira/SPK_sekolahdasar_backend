<?php
    header("Access-Control-Allow-Origin: *");
    header('Access-Control-Allow-Headers: *');
    require('../connection.php');
    
    $idsekolah = $_GET['idsekolah'];

    $ekstra = false;
    $sql = "DELETE FROM ekstrakurikuler_has_info_sekolah WHERE info_sekolah_idinfo_sekolah=".$idsekolah;
    if ($conn->query($sql) === TRUE) {
        $ekstra = true;
    } else {
      echo json_encode ("Error deleting record: " . $conn->error);
    }

    $foto = false;
    $sql2 = "DELETE FROM foto_sekolah WHERE info_sekolah_idinfo_sekolah=".$idsekolah;
    if ($conn->query($sql2) === TRUE) {
        $foto = true;
    } else {
      echo json_encode ("Error deleting record: " . $conn->error);
    }

    $review = false;
    $sql_review = "SELECT * FROM review WHERE info_sekolah_idinfo_sekolah=".$idsekolah;
    $result_review = $conn->query($sql_review);
    if ($result_review->num_rows > 0) {
        $sql3 = "DELETE FROM review WHERE info_sekolah_idinfo_sekolah=".$idsekolah;
        if ($conn->query($sql3) === TRUE) {
            $review = true;
        } else {
            echo json_encode ("Error deleting record: " . $conn->error);
        }
    } else {
        $review = true;
    }

    $rating = false;
    $sql_rating = "SELECT * FROM rating WHERE info_sekolah_id=".$idsekolah;
    $result_rating = $conn->query($sql_rating);
    if ($result_rating->num_rows > 0) {
        $sql5 = "DELETE FROM rating WHERE info_sekolah_id=".$idsekolah;
        if ($conn->query($sql5) === TRUE) {
            $rating = true;
        } else {
            echo json_encode ("Error deleting record: " . $conn->error);
        }
    } else {
        $rating = true;
    }

    $history = false;
    $sql_history = "SELECT * FROM info_sekolah_has_history WHERE info_sekolah_idinfo_sekolah=".$idsekolah;
    $result_history = $conn->query($sql_history);
    if ($result_history->num_rows > 0) {
        $sql4 = "DELETE FROM info_sekolah_has_history WHERE info_sekolah_idinfo_sekolah=".$idsekolah;
        if ($conn->query($sql4) === TRUE) {
            $history = true;
        } else {
        echo json_encode ("Error deleting record: " . $conn->error);
        }
    } else {
        $history = true;
    }
    if($ekstra == true && $foto == true && $review == true && $rating == true && $history == true){
        $sql_result = "DELETE FROM info_sekolah WHERE idinfo_sekolah=".$idsekolah;
        if ($conn->query($sql_result) === TRUE) {
           echo json_encode("sukses");
        } else {
          echo json_encode ("Error deleting record: " . $conn->error);
        }
    }
    else{
        echo json_encode("Ekstra:".$ekstra." Foto:".$foto." Review:".$review." Rating:".$rating."
         History:".$history);
    }

    
    
?>
