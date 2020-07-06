<?php
header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Headers: *');
require('../connection.php');

$id= $_GET['id'];
$sql_kriteria_bobot = "DELETE FROM kriteria_bobot WHERE kriteria_1=".$id;
if ($conn->query($sql_kriteria_bobot) === TRUE) {
    $sql_sekolah_bobot = "DELETE FROM sekolah_bobot WHERE kriteria_id=".$id;
    if ($conn->query($sql_sekolah_bobot) === TRUE) {
        $sql = "DELETE FROM kriteria WHERE idkriteria =".$id;
        if ($conn->query($sql) === TRUE) {
            echo json_encode("Record deleted successfully");
        } else {
            echo json_encode("Error deleting record: " . $conn->error);
        }
    } else {
        echo json_encode("Error deleting record: " . $conn->error);
    }
} else {
    echo json_encode("Error deleting record: " . $conn->error);
}







$conn->close();

?>