<?php 
    include('database.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body style = "display: flex; align-items: center; justify-content: center; flex-direction: column;">
    <div style = "display: flex; align-items: center; justify-content: center; border: 1px solid black; width: auto; height: auto; border-radius: 10px; padding: 30px; margin-top: 50px;"> 
        <form method= 'post' action=''>
            <label style = "font-weight: bold; font-size: 25px; margin-bottom: 20px"> First Name: </label>  <br> 
            <input type="text" name="first_name" style = "background-color: lightgray; padding: 5px;  padding-right: 150px; margin-top: 5px; border-radius: 5px;"> <br> <br>
             <label style = "font-weight: bold; font-size: 25px;"> Middle Name: </label>  <br> 
            <input type="text" name="middle_name" style = "background-color: lightgray; padding: 5px; padding-right: 150px; margin-top: 5px; border-radius: 5px;"> <br> <br>
             <label style = "font-weight: bold; font-size: 25px;"> Last Name: </label> <br> 
            <input type="text" name="last_name" style = "background-color: lightgray; padding: 5px; padding-right: 150px; margin-top: 5px; border-radius: 5px;"> <br> <br>
             <label style = "font-weight: bold; font-size: 25px;"> Email: </label> <br> 
            <input type="email" name="email" style = "background-color: lightgray; padding: 5px;padding-right: 150px;  margin-top: 5px; border-radius: 5px;"> <br> <br>
             <label style = "font-weight: bold; font-size: 25px;"> Mobile No: </label> <br> 
            <input type="text" name="mobile_no" style = "background-color: lightgray; padding: 5px; padding-right: 150px; margin-top: 5px; border-radius: 5px;"><br> 
            <button type="submit" name="submit" style= "background-color: lightblue; border: none; padding: 10px; border-radius: 10px; margin-top: 20px; cursor: pointer;"> Add Doctor  </button>
            <?php   
                 if(isset($_POST['submit'])){
                    if(empty($_POST['first_name']) || empty($_POST['last_name']) || empty($_POST['email']) || empty($_POST['mobile_no'])){
                        echo "<p style = 'color: red; font-weight: bold; margin-top: 10px;'> Please fill in all fields </p>";
                } else{
                    $first_name = $_POST['first_name'];
                    $middle_name = $_POST['middle_name'];
                    $last_name = $_POST['last_name'];
                    $email = $_POST['email'];
                    $mobile_no = $_POST['mobile_no'];


                    $sql = "INSERT INTO doctor (first_name, middle_name, last_name, email, mobile_no) 
                            VALUES ('$first_name', '$middle_name', '$last_name', '$email', '$mobile_no')";  

                    $result = mysqli_query($conn, $sql);

                    if($result){
                        header("Location: display_doctor.php");
                    }
                }
                
                 }
   
            ?>
        </form>
    </div>
</body>
</html>