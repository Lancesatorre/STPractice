<?php include 'database.php'; ?>

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
            <input type='datetime-local' name='datetime' placeholder='Enter consultation date' required>  <br>
             <label> Patient ID: </label>
            <input type='text' name='patient_id' placeholder='Enter patient ID' required> <br>
             <label> Doctor ID: </label>
            <input type='text' name='doctor_id' placeholder='Enter doctor ID' required> <br>
            <label> Diagnosis: </label>
            <textarea name='diagnosis' placeholder='Enter diagnosis' required></textarea> <br>
            <label> Prescription: </label>
            <textarea name='prescription' placeholder='Enter prescription' required></textarea> <br>
            <button type='submit' name="submit"> Submit </button>

    
        </form>

        <?php 
            if(isset($_POST['submit'])) {
                $datetime = $_POST['datetime'];
                $patient_id = $_POST['patient_id'];
                $doctor_id = $_POST['doctor_id'];
                $diagnosis = $_POST['diagnosis'];
                $prescription = $_POST['prescription'];


                $patientfoundsql = "SELECT * FROM patient WHERE patient_id = '$patient_id'";
                $patientfoundresult = mysqli_query($conn, $patientfoundsql);
                $doctorfoundsql = "SELECT * FROM doctor WHERE doctor_id = '$doctor_id'";
                $doctorfoundresult = mysqli_query($conn, $doctorfoundsql);


                if(mysqli_num_rows($patientfoundresult) == 0 && mysqli_num_rows($doctorfoundresult) == 0) {
                    echo "<p style = 'color: red; font-weight: bold; margin-top: 10px;'> Patient ID and Doctor ID not found </p>";
                    exit();
                }

                if(mysqli_num_rows($patientfoundresult) == 0) {
                    echo "<p style = 'color: red; font-weight: bold; margin-top: 10px;'> Patient ID not found </p>";
                    exit();
                }


          
                if(mysqli_num_rows($doctorfoundresult) == 0) {
                    echo "<p style = 'color: red; font-weight: bold; margin-top: 10px;'> Doctor ID not found </p>";
                    exit();
                }

                $sql = "INSERT INTO consultation (patient_id, doctor_id, consultDate,diagnosis, prescription) 
                        VALUES ('$patient_id', '$doctor_id', '$datetime', '$diagnosis', '$prescription')";
                $result = mysqli_query($conn, $sql);

                if($result){
                   header("Location: display_consultation.php");
                 
                }
            }
        
        
        
        ?>
    </div>

    
</body>
</html>