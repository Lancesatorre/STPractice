<?php 
    include 'db.php';

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
        <h1> CONSULTATION LIST</h1>
        <hr style="border: 1px solid black">
        <form action="" metho = 'get'>
               <input type="text" name="search" value = "<?php if(isset($_GET['search'])){ echo $_GET['search'];}?>">
               <button type="submit"> SEARCH</button> 
        </form>
        <table>
            <thead>
                <tr>
                    <th> No. </th>
                    <th> Consultation ID </th>
                    <th> Pet ID </th>
                     <th> Pet Name </th>
                    <th> Vet ID </th>
                     <th> Vet Name </th>
                    <th> Date</th>
                    <th> Diagnoses</th>
                    <th> prescription </th>
                    <th> Actions </th>
                    
                </tr>
            </thead>

            <tbody>
                <?php 

                    if(isset($_GET['search'])){
                        $search = $_GET['search'];
                        $count = 0;
                        $sql = "SELECT * FROM consultation WHERE CONCAT(consultID, petID,vetID, ' ', diagnoses, prescription) LIKE '%$search%' AND isDeleted = false;";
                        $result = mysqli_query($conn, $sql);

                        if(mysqli_num_rows($result) > 0) {
                            while($row = mysqli_fetch_assoc($result)){
                                 $count++;
                                $consultID = $row['consultID'];
                                $petID = $row['petID'];
                                $vetID = $row['vetID'];
                                $consultDate = $row['consultDate'];
                                $diagnoses = $row['diagnoses'];
                                $prescription = $row['prescription'];


                                $petName = "";
                                $petSql = "SELECT petName FROM pet WHERE petID = '$petID'";
                                $petResult = mysqli_query($conn, $petSql);

                                if (mysqli_num_rows($petResult) > 0) {
                                    $petRow = mysqli_fetch_assoc($petResult);
                                    $petName = $petRow['petName'];
                                }

      
                                $vetName = "";
                                $vetSql = "SELECT vetFName, vetLName FROM veterinarian WHERE vetID = '$vetID'";
                                $vetResult = mysqli_query($conn, $vetSql);

                                if (mysqli_num_rows($vetResult) > 0) {
                                    $vetRow = mysqli_fetch_assoc($vetResult);
                                    $vetName = $vetRow['vetFName'] . " " . $vetRow['vetLName'];
                                }

                               echo "<tr>
                                <td>$count</td>
                                <td>$consultID</td>
                                <td>$petID </td>
                                <th>$petName </th>
                                <td>$vetID</td>
                                <th>$vetName </th>
                                <td>$consultDate</td>
                                <td>$diagnoses</td>
                                <td>$prescription</td>
                                <td>
                                    <a href='consultation_edit.php?consultID=$consultID'>EDIT</a>
                                    |
                                    <a href='consultation_delete.php?consultID=$consultID'>DELETE</a>
                                </td>
                            </tr>";
                                }


                        }else {
                            echo "<tr> <td> No Record Found</td> </tr>";
                        }


                    }else{
                    $count = 0;
                    $sql = "SELECT * FROM consultation WHERE isDeleted = false";
                    $result = mysqli_query($conn, $sql);
                    
                    if($result){
                        while($row = mysqli_fetch_assoc($result)){
                              $count++;
                                $consultID = $row['consultID'];
                                $petID = $row['petID'];
                                $vetID = $row['vetID'];
                                $consultDate = $row['consultDate'];
                                $diagnoses = $row['diagnoses'];
                                $prescription = $row['prescription'];


                                $petName = "";
                                $petSql = "SELECT petName FROM pet WHERE petID = '$petID'";
                                $petResult = mysqli_query($conn, $petSql);

                                if (mysqli_num_rows($petResult) > 0) {
                                    $petRow = mysqli_fetch_assoc($petResult);
                                    $petName = $petRow['petName'];
                                }

      
                                $vetName = "";
                                $vetSql = "SELECT vetFName, vetLName FROM veterinarian WHERE vetID = '$vetID'";
                                $vetResult = mysqli_query($conn, $vetSql);

                                if (mysqli_num_rows($vetResult) > 0) {
                                    $vetRow = mysqli_fetch_assoc($vetResult);
                                    $vetName = $vetRow['vetFName'] . " " . $vetRow['vetLName'];
                                }

                               echo "<tr>
                                <td>$count</td>
                                <td>$consultID</td>
                                <td>$petID </td>
                                <th>$petName </th>
                                <td>$vetID</td>
                                <th>$vetName </th>
                                <td>$consultDate</td>
                                <td>$diagnoses</td>
                                <td>$prescription</td>
                                <td>
                                    <a href='consultation_edit.php?consultID=$consultID'>EDIT</a>
                                    |
                                    <a href='consultation_delete.php?consultID=$consultID'>DELETE</a>
                                </td>
                            </tr>";
                                }
                    }
                    }


                  
                
                
                ?>

            </tbody>
        </table>
    </div>
</body>
</html>