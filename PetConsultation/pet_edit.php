<?php 
    include 'db.php';

    $id = $_GET['petID'];
    $sql = "SELECT * FROM pet WHERE petID = '$id'";
    $result = mysqli_query($conn, $sql);

    if($result){
        $row = mysqli_fetch_assoc($result);
        $petID = $row['petID'];
        $petOwnerID = $row['petOwnerID'];
        $petName = $row['petName'];
        $petType = $row['petType'];
        $petBreed = $row['petBreed'];
        $petBDate = $row['petBDate'];
    }

    if(isset($_POST['addPet'])){
        $petOwnerID = $_POST['petOwnerID'];
        $petName = $_POST['petName'];
        $petType = $_POST['petType'];
        $petBreed = $_POST['petBreed'];
        $petBDate = $_POST['petBDate'];

        $sql = "UPDATE pet SET petOwnerID = '$petOwnerID',petName = '$petName',petType = '$petType',petBreed = '$petBreed' , petBDate = '$petBDate'
                WHERE petID = '$id'"; 
        $result = mysqli_query($conn, $sql);

        if($result){
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
            <input type="text" name="petID" disabled value = "<?php echo $petID; ?>"> <br> <br>
            <label for="">Name:</label>
            <input type="text" name="petName" value = "<?php echo $petName;?>"> <br> <br>
             <label for="">Type:</label>
            <input type="text" name="petType"  value = "<?php echo $petType;?>"> <br> <br>
             <label for="">Breed:</label>
            <input type="text" name="petBreed"  value = "<?php echo $petBreed;?>"> <br> <br>
             <label for="">Birth Date:</label>
            <input type="date" name="petBDate"  value ="<?php echo $petBDate; ?>"  disabled> <br> <br>
              <label for="">Owner ID:</label>
            <input type="text" name="petOwnerID"  value = "<?php echo $petOwnerID;?>"> <br> <br>
        
            <button type="submit" name="addPet"> Submit </button>

        </form>
    </div>    
</body>
</html>