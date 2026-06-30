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
<body style = "display: flex; align-items: center; justify-content: center; flex-direction: column;">
        <button type="button" name="back" style= "background-color: lightblue; border: none; padding: 10px; border-radius: 10px; margin-top: 20px; cursor: pointer;"> 
            <a style="text-decoration: none; color: black;" href="display_doctor.php"> Back to List</a> </button>
        <br> <br>
    <div style = "display: flex; align-items: center; justify-content: center; flex-direction: column; border: 1px solid black; width: auto; height: auto; border-radius: 10px; padding: 30px; margin-bottom: 20px;"> 
     
        
        <?php 
        
            if(isset($_GET['doctor_id'])){
                $doctor_id = $_GET['doctor_id'];

                $sql = "SELECT * FROM doctor WHERE doctor_id = $doctor_id";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_assoc($result);
                $first_name = $row['first_name'];
                $middle_name = $row['middle_name'];
                $last_name = $row['last_name'];
                $email = $row['email'];
                $mobile_no = $row['mobile_no'];
            }

            if(isset($_POST['update'])){
                $first_name = $_POST['first_name'];
                $middle_name = $_POST['middle_name'];
                $last_name = $_POST['last_name'];
                $email = $_POST['email'];
                $mobile_no = $_POST['mobile_no'];

                $sql = "UPDATE doctor SET first_name='$first_name', middle_name='$middle_name', last_name='$last_name', email='$email', mobile_no='$mobile_no' WHERE doctor_id=$doctor_id";
                $result = mysqli_query($conn, $sql);

                if($result){
                    header("Location: display_doctor.php");
                }
            }
            
        ?>
    
       <h1> Edit Doctor Information </h1>
        <hr style = "width: 100%; border: 1px solid black; margin-bottom: 30px;">
        <form method= 'post' action=''>
            <label style = "font-weight: bold; font-size: 25px; margin-bottom: 20px"> First Name: </label>  <br> 
            <input type="text" name="first_name" value="<?php echo $first_name; ?>" style = "background-color: lightgray; padding: 5px;  padding-right: 150px; margin-top: 5px; border-radius: 5px;"> <br> <br>
             <label style = "font-weight: bold; font-size: 25px;"> Middle Name: </label>  <br> 
            <input type="text" name="middle_name" value="<?php echo $middle_name; ?>" style = "background-color: lightgray; padding: 5px; padding-right: 150px; margin-top: 5px; border-radius: 5px;"> <br> <br>
             <label style = "font-weight: bold; font-size: 25px;"> Last Name: </label> <br> 
            <input type="text" name="last_name" value="<?php echo $last_name; ?>" style = "background-color: lightgray; padding: 5px; padding-right: 150px; margin-top: 5px; border-radius: 5px;"> <br> <br>
             <label style = "font-weight: bold; font-size: 25px;"> Email: </label> <br> 
            <input type="email" name="email" value="<?php echo $email; ?>" style = "background-color: lightgray; padding: 5px;padding-right: 150px;  margin-top: 5px; border-radius: 5px;"> <br> <br>
             <label style = "font-weight: bold; font-size: 25px;"> Mobile No: </label> <br> 
            <input type="text" name="mobile_no" value="<?php echo $mobile_no; ?>" style = "background-color: lightgray; padding: 5px; padding-right: 150px; margin-top: 5px; border-radius: 5px;"><br> 
            <button type="submit" name="update" style= "background-color: lightblue; border: none; padding: 10px; border-radius: 10px; margin-top: 20px; cursor: pointer;"> Update Doctor  </button>
        </form>
    </div>
</body>
</html>