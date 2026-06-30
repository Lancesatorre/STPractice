<?php
     include 'database.php';

     if(isset($_GET['doctor_id'])){
         $doctor_id = $_GET['doctor_id'];

         $sql = "DELETE FROM doctor WHERE doctor_id = $doctor_id";
         $result = mysqli_query($conn, $sql);

         if($result){
             header("Location: display_doctor.php");
         }
     }
?>

