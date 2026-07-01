<?php   
    include 'db.php';

    if(isset($_POST['addVet'])){
        
        $vetID = "VET-" . $_POST['vetID'];
        $vetFName = $_POST['vetFName'];
        $vetLName = $_POST['vetLName'];
        $vetAddress = $_POST['vetAddress'];
        $vetSpecial = $_POST['vetSpecial'];


        $sql = "INSERT INTO veterinarian (vetID, vetFName, vetLName, vetAddress, vetSpecial) 
                        VALUES ('$vetID', '$vetFName', '$vetLName', '$vetAddress', '$vetSpecial')";
        $return = mysqli_query($conn, $sql);

        if($return){
            echo "Added";
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
            <input type="text" name="vetID" maxLength = "4"> <br> <br>
            <label for="">First Name:</label>
            <input type="text" name="vetFName"> <br> <br>
             <label for="">Last Name:</label>
            <input type="text" name="vetLName"> <br> <br>
             <label for="">Address:</label>
            <input type="text" name="vetAddress"> <br> <br>
             <label for="">Veterinarian Special:</label>
            <input type="text" name="vetSpecial"> <br> <br>
        
            <button type="submit" name="addVet"> Submit </button>

        </form>
    </div>
</body>
</html>