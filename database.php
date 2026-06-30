<?php 

    $conn = new mysqli("localhost", "root", " ", "stdatabase");

    if(!$conn){
        echo "Failed to connect to database";
    }
   
?>