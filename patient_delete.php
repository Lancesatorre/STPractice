<?php 

    include 'database.php';

    $sql = "DELETE FROM patient WHERE patient_id = {$_GET['patient_id']}";
    $result = mysqli_query($conn, $sql);

    if($result){
        header("Location: display_patient.php");
        exit();
    }

?>