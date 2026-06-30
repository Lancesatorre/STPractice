<?php include 'database.php'; 

 include 'backhome.html';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Consultation Page</title>
</head>
<body style = "display: flex; align-items: center; justify-content: center; flex-direction: column;">
<h1 style = "font-weight: bold; font-size: 50px; margin-top: 50px;"> Consultation List </h1>

    <div style = "background-color: trasparent; margin-top: 50px; padding: 50px; border-radius: 50px; border: 0.5px solid darkgray"> 
        <table style = "border: 1px solid black; border-radius: 10px;"> 
            <thead >
                <tr >
                    <th style = "background-color: lightgray; border: 1px solid black; margin: 0px; padding: 5px;"> Consultation ID </th>
                    <th style = "background-color: lightgray; border: 1px solid black; margin: 0px; padding: 5px;"> Patient ID </th>
                    <th style = "background-color: lightgray; border: 1px solid black; margin: 0px; padding: 5px;"> Doctor ID </th>
                    <th style = "background-color: lightgray; border: 1px solid black; margin: 0px; padding: 5px;"> Consultation Date </th>
                    <th style = "background-color: lightgray; border: 1px solid black; margin: 0px; padding: 5px;"> Diagnosis </th>
                       <th style = "background-color: lightgray; border: 1px solid black; margin: 0px; padding: 5px;"> Prescription </th>
                    <th style = "background-color: lightgray; border: 1px solid black; margin: 0px; padding: 5px;"> Actions </th>
                </tr>
            </thead> 
               

                <?php  
                  $sql = "SELECT * FROM consultation";
                  $result = mysqli_query($conn, $sql);

                  if($result){
                     while($row = mysqli_fetch_assoc($result)){
                        $consultations_id = $row['consultations_id'];
                        $patient_id = $row['patient_id'];
                        $doctor_id = $row['doctor_id'];
                        $consultDate = $row['consultDate'];
                        $diagnosis = $row['diagnosis'];
                        $prescription = $row['prescription'];

                        echo "<tr>
                                <td style = 'background-color: lightgray;  border: 1px solid black; margin: 0px; padding: 5px;'> $consultations_id </td>
                                <td style = 'background-color: lightgray;  border: 1px solid black; margin: 0px; padding: 5px;'> $patient_id </td>
                                <td style = 'background-color: lightgray;  border: 1px solid black; margin: 0px; padding: 5px;'> $doctor_id </td>
                                <td style = 'background-color: lightgray;  border: 1px solid black; margin: 0px; padding: 5px;'> $consultDate </td>
                                <td style = 'background-color: lightgray;  border: 1px solid black; margin: 0px; padding: 5px;'> $diagnosis </td>
                                <td style = 'background-color: lightgray;  border: 1px solid black; margin: 0px; padding: 5px;'> $prescription </td>
                                <td style = 'background-color: lightgray;  border: 1px solid black; margin: 0px; padding: 5px;'>

                                    <button type='submit' name='edit'> <a href='consultation_edit.php?consultations_id=$consultations_id'> Edit </a> </button>
                                    <button type='submit' name='delete'> <a href='consultation_delete.php?consultations_id=$consultations_id'> Delete </a> </button>
                                </td>
                            </tr>";

                     }

                  }
                ?>
     

        </table>

    </div>

    <button type="submit" name="add_consultation" style= "background-color: lightblue; border: none; padding: 10px; border-radius: 10px; margin-top: 20px; cursor: pointer;"> <a style="text-decoration: none; color: black;" href="consultation_add.php"> Add Consultation </a> </button>

</body>
</html>