<?php include 'database.php'; 

            $sql = "SELECT * FROM patient WHERE patient_id = {$_GET['patient_id']}";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            $first_name = $row['first_name'];
            $middle_name = $row['middle_name'];
            $last_name = $row['last_name'];
            $date_of_birth = $row['date_of_birth'];
            $email = $row['email'];
            $address = $row['address'];
            $contact_no = $row['contact_no'];

            if(isset($_POST['submit'])){
                $first_name = $_POST['first_name'];
                $middle_name = $_POST['middle_name'];
                $last_name = $_POST['last_name'];
                $date_of_birth = $_POST['date_of_birth'];
                $email = $_POST['email'];
                $address = $_POST['address'];
                $contact_no = $_POST['contact_no'];

                $sql = "UPDATE patient SET first_name = '$first_name', middle_name = '$middle_name', last_name = '$last_name', date_of_birth = '$date_of_birth', email = '$email', address = '$address', contact_no = '$contact_no' WHERE patient_id = {$_GET['patient_id']}";   
                $result = mysqli_query($conn,$sql);

                if($result){
                    header("Location: display_patient.php");
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
    <div style ='display: flex; align-items: center; justify-content: center; flex-direction: column; width: auto; height: auto; margin: 50px; '>
        <form method= 'post' action=''>
            <label> First Name: </label>
            <input type='text' name='first_name' value = '<?php echo $first_name ?>' placeholder='Enter your first name' required>  <br>
             <label> Middle Name: </label>
            <input type='text' name='middle_name' value = '<?php echo $middle_name ?>' placeholder='Enter your middle name'> <br>
             <label> Last Name: </label>
            <input type='text' name='last_name' value = '<?php echo $last_name ?>' placeholder='Enter your last name' required> <br>
             <label> Date of Birth: </label>
            <input type='date' name='date_of_birth' value = '<?php echo $date_of_birth ?>' placeholder='Enter your date of birth' required> <br>
             <label> Email: </label>
            <input type='email' name='email' value = '<?php echo $email ?>' placeholder='Enter your email' required> <br>
              <label> Address: </label>
            <input type='text' name='address' value = '<?php echo $address ?>' placeholder='Enter your address' required> <br>
             <label> Contact No: </label>
            <input type='text' name='contact_no' value = '<?php echo $contact_no ?>' placeholder='Enter your contact number' required> <br>

            <button type='submit' name="submit"> Submit </button>
        </form>

      
    </div>    



</body>
</html>