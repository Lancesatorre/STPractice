<?php   
    include 'db.php';

    if(isset($_POST['addOwner'])){
        
        $petOwnerID = "PO-" . $_POST['petOwnerID'];
        $petOwnerFName = $_POST['petOwnerFName'];
        $petOwnerLName = $_POST['petOwnerLName'];
        $petOwnerBDate = $_POST['petOwnerBDate'];
        $petOwnerTelNo = $_POST['petOwnerTelNo'];


        $sql = "INSERT INTO petowner (petOwnerID, petOwnerFName, petOwnerLName, petOwnerBDate, petOwnerTelNo) 
                        VALUES ('$petOwnerID', '$petOwnerFName', '$petOwnerLName', '$petOwnerBDate', '$petOwnerTelNo')";
        $return = mysqli_query($conn, $sql);

        if($return){
            header('location: petowner_display.php');
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
           <label for="">Owner ID:</label>
            <input type="text" name="petOwnerID" maxLength = "4"> <br> <br>
            <label for="">First Name:</label>
            <input type="text" name="petOwnerFName"> <br> <br>
             <label for="">Last Name:</label>
            <input type="text" name="petOwnerLName"> <br> <br>
             <label for="">Birth Date:</label>
            <input type="datetime-local" name="petOwnerBDate"> <br> <br>
             <label for="">Tel No:</label>
            <input type="text" name="petOwnerTelNo"> <br> <br>
        
            <button type="submit" name="addOwner"> Submit </button>

        </form>
    </div>
</body>
</html>