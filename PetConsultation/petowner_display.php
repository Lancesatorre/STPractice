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
                    <th> Pet Owner ID </th>
                    <th> First Name </th>
                    <th> Last Name </th>
                    <th> Birth Date </th>
                    <th> Tel No. </th>
                    <th> Actions </th>
                </tr>
            </thead>

            <tbody>
                <?php 

                    if(isset($_GET['search'])){
                        $search = $_GET['search'];
                        $count = 0;
                        $sql = "SELECT * FROM petowner WHERE CONCAT(petOwnerID, petOwnerFName, ' ', petOwnerLName) LIKE '%$search%'";
                        $result = mysqli_query($conn, $sql);

                        if(mysqli_num_rows($result) > 0) {
                            while($row = mysqli_fetch_assoc($result)){
                                $count++;
                                $petOwnerID = $row['petOwnerID'];
                                $petOwnerFName = $row['petOwnerFName'];
                                $petOwnerLName = $row['petOwnerLName'];
                                $petOwnerBDate = $row['petOwnerBDate'];
                                $petOwnerTelNo = $row['petOwnerTelNo'];


                                echo "<tr> 
                                        <td> $count </td>
                                        <td> $petOwnerID </td>
                                        <td> $petOwnerFName</td>
                                        <td> $petOwnerLName </td>
                                        <td> $petOwnerBDate </td>
                                        <td> $petOwnerTelNo </td>
                                        <td> 
                                            <button type='submit'> <a href='petowner_edit.php?petOwnerID=$petOwnerID'> EDIT </a>
                                        <button type='submit'> <a href='petowner_delete.php?petOwnerID=$petOwnerID'> DELETE </a>
                                        </td>
                                    </tr>";
                                }


                        }else {
                            echo "<tr> <td> No Record Found</td> </tr>";
                        }


                    }else{
                          $count = 0;
                    $sql = "SELECT * FROM petowner WHERE isDeleted = false";
                    $result = mysqli_query($conn, $sql);
         
                    if($result){
                        while($row = mysqli_fetch_assoc($result)){
                            $count++;
                            $petOwnerID = $row['petOwnerID'];
                            $petOwnerFName = $row['petOwnerFName'];
                            $petOwnerLName = $row['petOwnerLName'];
                            $petOwnerBDate = $row['petOwnerBDate'];
                            $petOwnerTelNo = $row['petOwnerTelNo'];


                            echo "<tr> 
                                    <td> $count </td>
                                    <td> $petOwnerID </td>
                                    <td> $petOwnerFName</td>
                                    <td> $petOwnerLName </td>
                                    <td> $petOwnerBDate </td>
                                    <td> $petOwnerTelNo </td>
                                    <td> 
                                        <button type='submit'> <a href='petowner_edit.php?petOwnerID=$petOwnerID'> EDIT </a>
                                      <button type='submit'> <a href='petowner_delete.php?petOwnerID=$petOwnerID'> DELETE </a>
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