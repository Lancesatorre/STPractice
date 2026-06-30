<?php include 'database.php'; 

    $sql = "SELECT * FROM consultation WHERE consultations_id = {$_GET['consultations_id']}";
    $result = mysqli_query($conn, $sql);
    if($result){
        $row = mysqli_fetch_assoc($result);
        $consultDate = $row['consultDate'];
        $patient_id = $row['patient_id'];
        $doctor_id = $row['doctor_id'];
        $diagnosis = $row['diagnosis'];
        $prescription = $row['prescription'];
    }

    if(isset($_POST['update'])){
        $consultDate = $_POST['datetime'];
        $patient_id = $_POST['patient_id'];
        $doctor_id = $_POST['doctor_id'];
        $diagnosis = $_POST['diagnosis'];
        $prescription = $_POST['prescription'];

        $sql = "UPDATE consultation SET consultDate = '$consultDate', patient_id = '$patient_id', doctor_id = '$doctor_id', diagnosis = '$diagnosis', prescription = '$prescription' WHERE consultations_id = {$_GET['consultations_id']}";
        $result = mysqli_query($conn, $sql);
        if($result){
            header("Location: display_consultation.php");
            exit();
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
        <form method= 'post' action=''>
            <label> Consultation Date: </label>
            <input type='datetime-local' name='datetime' value = "<?php echo $consultDate ?>" placeholder='Enter consultation date' required>  <br>
             <label> Patient ID: </label>
            <input type='text' name='patient_id'    value = "<?php echo $patient_id ?>" placeholder='Enter patient ID' required> <br>
             <label> Doctor ID: </label>
            <input type='text' name='doctor_id' value = "<?php echo $doctor_id ?>" placeholder='Enter doctor ID' required> <br>
            <label> Diagnosis: </label>
            <textarea name='diagnosis' placeholder='Enter diagnosis' required><?php echo $diagnosis ?></textarea> <br>
            <label> Prescription: </label>
            <textarea name='prescription' placeholder='Enter prescription' required><?php echo $prescription ?></textarea> <br>
            <button type='submit' name="update"> Update Consultation </button>

    
        </form>
    </div>

    
</body>
</html>