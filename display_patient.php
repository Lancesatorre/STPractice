<?php 
    include 'database.php';
    include 'backhome.html';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <button><a href="patient_add.php"> Add Patient </a> </button>
    <form method = "get" action = ""> 
        <input type="text" name="search" value="<?php if(isset($_GET['search'])){echo $_GET['search'];}?>">
        <button type="submit">Search</button>
    </form>
    <div style = " display: flex; align-items: center; justify-content: center; flex-direction: column; border: 1px solid black; text-align: left;">
        <table>
            <thead>
                <tr>
                    <th style = 'border: 1px solid gray; '> Patient ID </th>
                    <th style = 'border: 1px solid gray; '>First Name</th>
                    <th style = 'border: 1px solid gray; '>Middle Name</th>
                    <th style = 'border: 1px solid gray; '>Last Name</th>
                    <th style = 'border: 1px solid gray; '>Date of Birth</th>
                    <th style = 'border: 1px solid gray; '>Email</th>
                    <th style = 'border: 1px solid gray; '>Address</th>
                    <th style = 'border: 1px solid gray; '>Contact No</th>
                        <th style = 'border: 1px solid gray; '>Created At</th>
                    <th style = 'border: 1px solid gray; '> Actions </th>
                </tr>
            </thead>
            <?php 

                
                if(isset($_GET['search'])){
                    $search = $_GET['search'];
                    $count = 0;

                    $sql = "SELECT * FROM patient WHERE CONCAT(first_name, last_name, middle_name) LIKE '%$search%'";
                    $result = mysqli_query($conn, $sql);

                    if(mysqli_num_rows($result) > 0){
                        while($row = mysqli_fetch_assoc($result)){
                            $count++;
                            $patient_id = $row['patient_id'];
                            $first_name = $row['first_name'];
                            $middle_name = $row['middle_name'];
                            $last_name = $row['last_name'];
                            $date_of_birth = $row['date_of_birth'];
                            $email = $row['email'];
                            $address = $row['address'];
                            $contact_no = $row['contact_no'];
                            $date_created = $row['date_created'];

                             echo " <tr> 
                                <td style = 'border: 1px solid gray; '> $count </td>
                                <td style = 'border: 1px solid gray; '> $first_name </td>
                                <td style = 'border: 1px solid gray; '> $middle_name </td>
                                <td style = 'border: 1px solid gray; '> $last_name </td>
                                <td style = 'border: 1px solid gray; '> $date_of_birth </td>
                                <td style = 'border: 1px solid gray; '> $email </td>
                                <td style = 'border: 1px solid gray; '> $address </td>
                                <td style = 'border: 1px solid gray; '> $contact_no </td>
                                <td style = 'border: 1px solid gray; '> $date_created </td>
                                <td style = 'border: 1px solid gray; '> 
                                    <button type='submit' name='edit'> <a href='patient_edit.php?patient_id=$patient_id'> Edit </a> </button>
                                     <button type='submit' name='delete'> <a href='patient_delete.php?patient_id=$patient_id'> Delete </a> </button>
                                </td>
                            </tr>
                            ";
                        }
                    } else {
                        echo "<tr><td colspan='10'>No patients found.</td></tr>";
                    }




                }else {
                      $sql = "SELECT * FROM patient";
                 $result= mysqli_query($conn,$sql);

                    $count = 0;

                if($result){
                    while($row = mysqli_fetch_assoc($result)){
                        $count++;
                        $patient_id = $row['patient_id'];
                        $first_name = $row['first_name'];
                        $middle_name = $row['middle_name'];
                        $last_name = $row['last_name'];
                        $date_of_birth = $row['date_of_birth'];
                        $email = $row['email'];
                        $address = $row['address'];
                        $contact_no = $row['contact_no'];
                        $date_created = $row['date_created'];

                       
                        echo " <tr> 
          
                                <td style = 'border: 1px solid gray; '> $count </td>
                                <td style = 'border: 1px solid gray; '> $first_name </td>
                                <td style = 'border: 1px solid gray; '> $middle_name </td>
                                <td style = 'border: 1px solid gray; '> $last_name </td>
                                <td style = 'border: 1px solid gray; '> $date_of_birth </td>
                                <td style = 'border: 1px solid gray; '> $email </td>
                                <td style = 'border: 1px solid gray; '> $address </td>
                                <td style = 'border: 1px solid gray; '> $contact_no </td>
                                <td style = 'border: 1px solid gray; '> $date_created </td>
                                <td style = 'border: 1px solid gray; '> 
                                    <button type='submit' name='edit'> <a href='patient_edit.php?patient_id=$patient_id'> Edit </a> </button>
                                     <button type='submit' name='delete'> <a href='patient_delete.php?patient_id=$patient_id'> Delete </a> </button>
                                </td>
                            </tr>
                            ";
                    }
                 }


                }
            ?>
            
        </table>

    </div>
</body>
</html>