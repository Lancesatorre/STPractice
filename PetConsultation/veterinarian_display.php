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
        <h1> VETERINARIAN LIST</h1>
        <hr style="border: 1px solid black">
        <form action="" metho = 'get'>
               <input type="text" name="search" value = "<?php if(isset($_GET['search'])){ echo $_GET['search'];}?>">
               <button type="submit"> SEARCH</button> 
        </form>
        <table>
            <thead>
                <tr>
                    <th> No. </th>
                    <th> Veterinarian ID </th>
                    <th> First Name </th>
                    <th> Last Name </th>
                    <th> Address </th>
                    <th> Specialization </th>
                    <th> Actions </th>
                </tr>
            </thead>

            <tbody>
                <?php 

                    if(isset($_GET['search'])){
                        $search = $_GET['search'];
                        $count = 0;
                        $sql = "SELECT * FROM veterinarian WHERE CONCAT(vetID, vetFName, ' ', vetLName) LIKE '%$search%' AND isDeleted = false ";
                        $result = mysqli_query($conn, $sql);

                        if(mysqli_num_rows($result) > 0) {
                            while($row = mysqli_fetch_assoc($result)){
                                $count++;
                                $vetID =$row['vetID'];
                                $vetFName = $row['vetFName'];
                                $vetLName = $row['vetLName'];
                                $vetAddress = $row['vetAddress'];
                                $vetSpecial = $row['vetSpecial'];


                                echo "<tr> 
                                        <td> $count </td>
                                        <td> $vetID </td>
                                        <td> $vetFName</td>
                                        <td> $vetLName </td>
                                        <td> $vetAddress </td>
                                        <td> $vetSpecial </td>
                                        <td> 
                                            <button type='submit'> <a href='veterinarian_edit.php?vetID=$vetID'> EDIT </a>
                                        <button type='submit'> <a href='veterinarian_delete.php?vetID=$vetID'> DELETE </a>
                                        </td>
                                    </tr>";
                                }


                        }else {
                            echo "<tr> <td> No Record Found</td> </tr>";
                        }


                    }else{
                          $count = 0;
                    $sql = "SELECT * FROM veterinarian WHERE isDeleted = false";
                    $result = mysqli_query($conn, $sql);
         
                    if($result){
                        while($row = mysqli_fetch_assoc($result)){
                           $count++;
                                $vetID =$row['vetID'];
                                $vetFName = $row['vetFName'];
                                $vetLName = $row['vetLName'];
                                $vetAddress = $row['vetAddress'];
                                $vetSpecial = $row['vetSpecial'];


                                echo "<tr> 
                                        <td> $count </td>
                                        <td> $vetID </td>
                                        <td> $vetFName</td>
                                        <td> $vetLName </td>
                                        <td> $vetAddress </td>
                                        <td> $vetSpecial </td>
                                        <td> 
                                            <button type='submit'> <a href='veterinarian_edit.php?vetID=$vetID'> EDIT </a>
                                        <button type='submit'> <a href='veterinarian_delete.php?vetID=$vetID'> DELETE </a>
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