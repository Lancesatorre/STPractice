<?php 
    include 'db.php';


    $id = $_GET['petOwnerID'];

    $sql = " UPDATE petowner SET isDeleted = true WHERE petOwnerID = '$id'";
    $result = mysqli_query($conn, $sql);

    if($result){

        header('location: petowner_display.php');
    }

?>

