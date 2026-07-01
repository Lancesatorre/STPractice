<?php 
    include 'db.php';

    $id = $_GET['petOwnerID'];
    $sql = "SELECT * FROM petowner WHERE petOwnerID = '$id'";
    $result = mysqli_query($conn, $sql);

    if($result){
        $row = mysqli_fetch_assoc($result);
        $petOwnerID = $row['petOwnerID'];
        $petOwnerFName = $row['petOwnerFName'];
        $petOwnerLName = $row['petOwnerLName'];
        $petOwnerBDate = $row['petOwnerBDate'];
        $petOwnerTelNo = $row['petOwnerTelNo'];
    }

    if(isset($_POST['editOwner'])){
        $petOwnerFName = $_POST['petOwnerFName'];
         $petOwnerLName = $_POST['petOwnerLName'];
          $petOwnerBDate = $_POST['petOwnerBDate'];
           $petOwnerTelNo = $_POST['petOwnerTelNo'];

        $sql = "UPDATE petowner SET petOwnerFName = '$petOwnerFName',petOwnerLName = '$petOwnerLName',petOwnerBDate = '$petOwnerBDate',petOwnerTelNo = '$petOwnerTelNo' 
                WHERE petOwnerID = '$petOwnerID'"; 
        $result = mysqli_query($conn, $sql);

        if($result){
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
            <input type="text" name="petOwnerID" value="<?php echo $petOwnerID; ?>" disabled> <br> <br>
            <label for="">First Name:</label>
            <input type="text" name="petOwnerFName" value="<?php echo $petOwnerFName; ?>"> <br> <br>
             <label for="">Last Name:</label>
            <input type="text" name="petOwnerLName" value="<?php echo $petOwnerLName; ?>"> <br> <br>
             <label for="">Birth Date:</label>
            <input type="datetime-local" name="petOwnerBDate" value="<?php echo $petOwnerBDate; ?>"> <br> <br>
             <label for="">Tel No:</label>
            <input type="text" name="petOwnerTelNo" value="<?php echo $petOwnerTelNo; ?>"> <br> <br>
        
            <button type="submit" name="editOwner"> Submit </button>
        </form>
    </div>    
</body>
</html>