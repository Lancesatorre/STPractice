<?php 
    include 'db.php';

    $id = $_GET['consultID'];
    $sql = "SELECT * FROM consultation WHERE consultID = '$id'";
    $result = mysqli_query($conn, $sql);

    if($result){
        $row = mysqli_fetch_assoc($result);
         $consultID =$row['consultID'];
                                $petID = $row['petID'];
                                $vetID = $row['vetID'];
                                $consultDate = $row['consultDate'];
                                $diagnoses = $row['diagnoses'];
                                $prescription = $row['prescription'];
    }

    if(isset($_POST['addconsult'])){
        $consultID = $_POST['consultID'];
        $petID = $_POST['petID'];
        $vetID = $_POST['vetID'];
        $consultDate = $_POST['consultDate'];
        $diagnoses = $_POST['diagnoses'];
        $prescription =$_POST['prescription'];

        $sql = "UPDATE consultation SET petID = '$petID', vetID = '$vetID', consultDate = '$consultDate' , diagnoses = '$diagnoses', prescription = '$prescription'
                WHERE consultID = '$id'"; 
        $result = mysqli_query($conn, $sql);

        if($result){
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
            <input type="text" name="consultID" value = "<?php echo $consultID; ?>" disabled> <br> <br>
            <label for="">Pet ID:</label>
            <input type="text" name="petID" value = "<?php echo $petID; ?>" > <br> <br>
             <label for="">Vet ID:</label>
            <input type="text" name="vetID" value = "<?php echo $vetID; ?>"> <br> <br>
             <label for=""> Date and Time:</label>
            <input type="datetime-local" name="consultDate" value = "<?php echo $consultDate; ?>"> <br> <br>
             <label for="">Diagnoses:</label>
            <input type="text" name="diagnoses" value = "<?php echo $diagnoses; ?>"> <br> <br>
              <label for="">Prescription:</label>
            <input type="text" name="prescription" value = "<?php echo $prescription; ?>"> <br> <br>
        
            <button type="submit" name="addconsult" > Submit </button>

        </form>
    </div>
</body>
</html>