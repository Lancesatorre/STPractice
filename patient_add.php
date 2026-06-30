<?php 
    include 'database.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body style="display: flex; margin:0px;">
    <div style ='display: flex; align-items: center; justify-content: center; flex-direction: column; width: auto; height: auto; margin: 50px; '>
        <form method= 'post' action=''>
            <label> First Name: </label>
            <input type='text' name='first_name' placeholder='Enter your first name' required>  <br>
             <label> Middle Name: </label>
            <input type='text' name='middle_name' placeholder='Enter your middle name'> <br>
             <label> Last Name: </label>
            <input type='text' name='last_name' placeholder='Enter your last name' required> <br>
             <label> Date of Birth: </label>
            <input type='date' name='date_of_birth' placeholder='Enter your date of birth' required> <br>
             <label> Email: </label>
            <input type='email' name='email' placeholder='Enter your email' required> <br>
              <label> Address: </label>
            <input type='text' name='address' placeholder='Enter your address' required> <br>
             <label> Contact No: </label>
            <input type='text' name='contact_no' placeholder='Enter your contact number' required> <br>

            <button type='submit' name="submit"> Submit </button>
        </form>

        <?php 
        
        if(isset($_POST['submit'])){
            $first_name = $_POST['first_name'];
            $middle_name = $_POST['middle_name'];
            $last_name = $_POST['last_name'];
            $date_of_birth = $_POST['date_of_birth'];
            $email = $_POST['email'];
            $address = $_POST['address'];
            $contact_no = $_POST['contact_no'];

            $sql = "INSERT INTO patient (first_name, middle_name, last_name, date_of_birth, email, address, contact_no) 
                    VALUES ('$first_name', '$middle_name', '$last_name', '$date_of_birth', '$email', '$address', '$contact_no')";
            $result = mysqli_query($conn, $sql);

            if($result){
                header("Location: display_patient.php");
             
            }

        }
        
        
        
        ?>
    </div>    

</body>
</html>