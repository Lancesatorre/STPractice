<?php 
    include 'db.php';


    $id = $_GET['vetID'];

    $sql = " UPDATE veterinarian SET isDeleted = true WHERE vetID = '$id'";
    $result = mysqli_query($conn, $sql);

    if($result){

        header('location: veterinarian_display.php');
    }

?>

