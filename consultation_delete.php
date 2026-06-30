<?php include 'database.php'; 

   $sql = "DELETE FROM consultation WHERE consultations_id = {$_GET['consultations_id']}";
   $result = mysqli_query($conn, $sql);

   if($result){
       header("Location: display_consultation.php");
       exit();
   }
?>