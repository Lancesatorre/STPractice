<?php 
    include 'db.php';


    $id = $_GET['petID'];

    $sql = " UPDATE pet SET isDeleted = true WHERE petID = '$id'";
    $result = mysqli_query($conn, $sql);

    if($result){

        header('location: pet_display.php');
    }

?>

