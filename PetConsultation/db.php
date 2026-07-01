<?php 
    $conn = new mysqli('localhost', 'root', '', 'petconsultation');

    if(!$conn){
        echo "Not connected";
    }
?>