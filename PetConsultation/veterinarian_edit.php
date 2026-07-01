<?php 
    include 'db.php';

    $id = $_GET['vetID'];
    $sql = "SELECT * FROM veterinarian WHERE vetID = '$id'";
    $result = mysqli_query($conn, $sql);

    if($result){
        $row = mysqli_fetch_assoc($result);
        $vetID =$row['vetID'];
        $vetFName = $row['vetFName'];
        $vetLName = $row['vetLName'];
        $vetAddress = $row['vetAddress'];
        $vetSpecial = $row['vetSpecial'];
    }

    if(isset($_POST['editOwner'])){
        $vetFName = $_POST['vetFName'];
        $vetLName =$_POST['vetLName'];
        $vetAddress = $_POST['vetAddress'];
        $vetSpecial = $_POST['vetSpecial'];

        $sql = "UPDATE veterinarian SET vetFName = '$vetFName',vetLName = '$vetLName',vetAddress = '$vetAddress',vetSpecial = '$vetSpecial' 
                WHERE vetID = '$id'"; 
        $result = mysqli_query($conn, $sql);

        if($result){
            header('location: veterinarian_display.php');
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
           <label for="">Veterinarian ID:</label>
            <input type="text" name="vetID" value="<?php echo $vetID; ?>" disabled> <br> <br>
            <label for="">First Name:</label>
            <input type="text" name="vetFName" value="<?php echo $vetFName; ?>"> <br> <br>
             <label for="">Last Name:</label>
            <input type="text" name="vetLName" value="<?php echo $vetLName; ?>"> <br> <br>
             <label for="">Address:</label>
            <input type="text" name="vetAddress" value="<?php echo $vetAddress; ?>"> <br> <br>
             <label for="">Specialization:</label>
            <input type="text" name="vetSpecial" value="<?php echo $vetSpecial; ?>"> <br> <br>
        
            <button type="submit" name="editOwner"> Submit </button>
        </form>
    </div>    
</body>
</html>