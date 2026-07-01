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
        <h1> PET OWNER LIST</h1>
        <hr style="border: 1px solid black">
        <form action="" metho = 'get'>
               <input type="text" name="search" value = "<?php if(isset($_GET['search'])){ echo $_GET['search'];}?>">
               <button type="submit"> SEARCH</button> 
        </form>
        <table>
            <thead>
                <tr>
                    <th> No. </th>
                    <th> Pet ID </th>
                    <th> Owner ID </th>
                    <th> Owner Name </th>
                    <th> Pet Name </th>
                    <th> Type</th>
                    <th> Breed </th>
                    <th> Birth Date </th>
                    <th> Actions </th>
                    
                </tr>
            </thead>

            <tbody>
                <?php 

                    if(isset($_GET['search'])){
                        $search = $_GET['search'];
                        $count = 0;
                        $sql = "SELECT * FROM pet WHERE CONCAT(petID, petName, ' ', petType, petBreed) LIKE '%$search%' AND isDeleted = false;";
                        $result = mysqli_query($conn, $sql);

                        if(mysqli_num_rows($result) > 0) {
                            while($row = mysqli_fetch_assoc($result)){
                                $count++;
                                $petID =$row['petID'];
                                $petOwnerID = $row['petOwnerID'];
                                $petName = $row['petName'];
                                $petType = $row['petType'];
                                $petBreed = $row['petBreed'];
                                $petBDate = $row['petBDate'];


                                echo "<tr> 
                                        <td> $count </td>
                                        <td> $petID </td>
                                        <td> $petOwnerID</td>
                                        <td>   </td>
                                        <td> $petName </td>
                                        <td> $petType </td>
                                        <td> $petBreed </td>
                                        <td> $petBDate</td>
                                        <td> 
                                            <button type='submit'> <a href='pet_edit.php?petID=$petID'> EDIT </a>
                                        <button type='submit'> <a href='pet_delete.php?petID=$petID'> DELETE </a>
                                        </td>
                                    </tr>";
                                }


                        }else {
                            echo "<tr> <td> No Record Found</td> </tr>";
                        }


                    }else{
                          $count = 0;
                    $sql = "SELECT * FROM pet WHERE isDeleted = false";
                    $result = mysqli_query($conn, $sql);
         
                    if($result){
                        while($row = mysqli_fetch_assoc($result)){
                            $count++;
                                $petID =$row['petID'];
                                $petOwnerID = $row['petOwnerID'];
                                $petName = $row['petName'];
                                $petType = $row['petType'];
                                $petBreed = $row['petBreed'];
                                $petBDate = $row['petBDate'];


                                echo "<tr> 
                                        <td> $count </td>
                                        <td> $petID </td>
                                        <td> $petOwnerID</td>
                                        <td>   </td>
                                        <td> $petName </td>
                                        <td> $petType </td>
                                        <td> $petBreed </td>
                                        <td> $petBDate</td>
                                        <td> 
                                            <button type='submit'> <a href='pet_edit.php?petID=$petID'> EDIT </a>
                                        <button type='submit'> <a href='pet_delete.php?petID=$petID'> DELETE </a>
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