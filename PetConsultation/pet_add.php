<?php   
    include 'db.php';

    if(isset($_POST['addPet'])){
        
        $petID = "PET-" . $_POST['petID'];
        $petName = $_POST['petName'];
        $petType = $_POST['petType'];
        $petBreed = $_POST['petBreed'];
        $petBDate = $_POST['petBDate'];
        $petOwnerID = $_POST['petOwnerID'];


        $sql = "INSERT INTO pet (petID, petName, petType, petBreed, petBDate, petOwnerID) 
                        VALUES ('$petID', '$petName', '$petType', '$petBreed', '$petBDate', '$petOwnerID')";
        $return = mysqli_query($conn, $sql);

        if($return){
            header('location: pet_display.php');
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
           <label for="">Pet ID:</label>
            <input type="text" name="petID" maxLength = "4"> <br> <br>
            <label for="">Name:</label>
            <input type="text" name="petName"> <br> <br>
             <label for="">Type:</label>
            <input type="text" name="petType"> <br> <br>
             <label for="">Breed:</label>
            <input type="text" name="petBreed"> <br> <br>
             <label for="">Birth Date:</label>
            <input type="date" name="petBDate"> <br> <br>
              <label for="">Owner ID:</label>
            <input type="text" name="petOwnerID"> <br> <br>
        
            <button type="submit" name="addPet"> Submit </button>

        </form>
    </div>
</body>
</html>