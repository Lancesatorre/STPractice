<?php 

    $birthdate = new DateTime('1995-05-15');
    $today = new DateTime();

    $age = $today->diff($birthdate);


    echo $age->y;

?>