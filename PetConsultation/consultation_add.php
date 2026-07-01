<?php   
    include 'db.php';

    if(isset($_POST['addconsult'])){
        
        $consultID = "C-" . $_POST['consultID'];
        $petID = $_POST['petID'];
        $vetID = $_POST['vetID'];
        $consultDate = $_POST['consultDate'];
        $diagnoses = $_POST['diagnoses'];
        $prescription = $_POST['prescription'];


        $sql = "INSERT INTO consultation (consultID, petID, vetID, consultDate, diagnoses, prescription) 
                        VALUES ('$consultID', '$petID', '$vetID', '$consultDate', '$diagnoses', '$prescription')";
        $return = mysqli_query($conn, $sql);

        if($return){
            header('location: consultation_display.php');
        }

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        <form action="" method ="post">
           <label for="">Consult ID:</label>
            <input type="text" name="consultID" maxLength = "4"> <br> <br>
            <label for="">Pet ID:</label>
            <input type="text" name="petID"> <br> <br>
             <label for="">Vet ID:</label>
            <input type="text" name="vetID"> <br> <br>
             <label for=""> Date and Time:</label>
            <input type="datetime-local" name="consultDate"> <br> <br>
             <label for="">Diagnoses:</label>
            <input type="text" name="diagnoses"> <br> <br>
              <label for="">Prescription:</label>
            <input type="text" name="prescription"> <br> <br>
        
            <button type="submit" name="addconsult"> Submit </button>

        </form>
    </div>
</body>
</html>