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

   
    <h1 style = "font-weight: bold; font-size: 50px; margin-top: 50px;"> Doctor List </h1>

    <form method = "get" action = ""> 
         <input type="text" name = "search"  value="<?php if(isset($_GET['search'])){echo $_GET['search'];}?>">
    <button type="submit"> Search </button>
    </form>
   

     <div style = " display: flex; align-items: center; justify-content: center; flex-direction: column; background-color: trasparent; margin-top: 50px; padding: 50px; border-radius: 50px; border: 0.5px solid darkgray"> 
        <table style = "border: 1px solid black; border-radius: 10px;"> 
            <thead >
                <tr >
                    <th style = "background-color: lightgray; border: 1px solid black; margin: 0px; padding: 5px;"> Doctor ID </th>
                    <th style = "background-color: lightgray; border: 1px solid black; margin: 0px; padding: 5px;"> First Name </th>
                    <th style = "background-color: lightgray; border: 1px solid black; margin: 0px; padding: 5px;"> Middle Name </th>
                    <th style = "background-color: lightgray; border: 1px solid black; margin: 0px; padding: 5px;"> Last Name </th>
                    <th style = "background-color: lightgray; border: 1px solid black; margin: 0px; padding: 5px;"> Email </th>
                       <th style = "background-color: lightgray; border: 1px solid black; margin: 0px; padding: 5px;"> Mpbile No. </th>
                    <th style = "background-color: lightgray; border: 1px solid black; margin: 0px; padding: 5px;"> Date Created </th>
                    <th style = "background-color: lightgray; border: 1px solid black; margin: 0px; padding: 5px;"> Actions </th>
                </tr>
            </thead> 
               

                <?php  

                        if(isset($_GET['search'])) {
                            $search = $_GET['search'];

                            $sql = "SELECT * FROM doctor WHERE CONCAT(first_name, middle_name, last_name) LIKE '%$search%'";
                            $result = mysqli_query($conn, $sql);

                            if(mysqli_num_rows($result) > 0) {
                                foreach($result as $row) {
                                    $doctor_id = $row['doctor_id'];
                                    $first_name = $row['first_name'];
                                    $middle_name = $row['middle_name'];
                                    $last_name = $row['last_name'];
                                    $email = $row['email'];
                                    $mobile_no = $row['mobile_no'];
                                    $date_created = $row['date'];

                                    echo "<tr>
                                            <td style = 'background-color: lightgray;  border: 1px solid black; margin: 0px; padding: 5px;'> $doctor_id </td>
                                            <td style = 'background-color: lightgray;  border: 1px solid black; margin: 0px; padding: 5px;'> $first_name </td>
                                            <td style = 'background-color: lightgray;  border: 1px solid black; margin: 0px; padding: 5px;'> $middle_name </td>
                                            <td style = 'background-color: lightgray;  border: 1px solid black; margin: 0px; padding: 5px;'> $last_name </td>
                                            <td style = 'background-color: lightgray;  border: 1px solid black; margin: 0px; padding: 5px;'> $email </td>
                                            <td style = 'background-color: lightgray;  border: 1px solid black; margin: 0px; padding: 5px;'> $mobile_no </td>
                                            <td style = 'background-color: lightgray;  border: 1px solid black; margin: 0px; padding: 5px;'> $date_created </td>
                                            <td style = 'background-color: lightgray;  border: 1px solid black; margin: 0px; padding: 5px;'>
                                                <button type='button' name='edit'> <a href='doctor_edit.php?doctor_id=$doctor_id'> Edit </a> </button>
                                               <button type='button' name='delete'> <a href='doctor_delete.php?doctor_id=$doctor_id'> Delete </a> </button>
                                               
                                            </td>
                                        </tr>";   
                                }

                            } else {
                                echo "<tr><td colspan='8'>No doctors found.</td></tr>";
                            }

                        }else {
                            $sql = "SELECT * FROM doctor";
                            $result= mysqli_query($conn,$sql);

                            if($result){
                                while($row = mysqli_fetch_assoc($result)){
                                  $doctor_id = $row['doctor_id'];
                                    $first_name = $row['first_name'];
                                    $middle_name = $row['middle_name'];
                                    $last_name = $row['last_name'];
                                    $email = $row['email'];
                                    $mobile_no = $row['mobile_no'];
                                    $date_created = $row['date'];

                                   echo "<tr>
                                            <td style = 'background-color: lightgray;  border: 1px solid black; margin: 0px; padding: 5px;'> $doctor_id </td>
                                            <td style = 'background-color: lightgray;  border: 1px solid black; margin: 0px; padding: 5px;'> $first_name </td>
                                            <td style = 'background-color: lightgray;  border: 1px solid black; margin: 0px; padding: 5px;'> $middle_name </td>
                                            <td style = 'background-color: lightgray;  border: 1px solid black; margin: 0px; padding: 5px;'> $last_name </td>
                                            <td style = 'background-color: lightgray;  border: 1px solid black; margin: 0px; padding: 5px;'> $email </td>
                                            <td style = 'background-color: lightgray;  border: 1px solid black; margin: 0px; padding: 5px;'> $mobile_no </td>
                                            <td style = 'background-color: lightgray;  border: 1px solid black; margin: 0px; padding: 5px;'> $date_created </td>
                                            <td style = 'background-color: lightgray;  border: 1px solid black; margin: 0px; padding: 5px;'>
                                                <button type='button' name='edit'> <a href='doctor_edit.php?doctor_id=$doctor_id'> Edit </a> </button>
                                               <button type='button' name='delete'> <a href='doctor_delete.php?doctor_id=$doctor_id'> Delete </a> </button>
                                               
                                            </td>
                                        </tr>";   
                                }
                            }

                        }
                        
                ?>
     

        </table>

    </div>

    <button type="submit" name="add_doctor" style= "background-color: lightblue; border: none; padding: 10px; border-radius: 10px; margin-top: 20px; cursor: pointer;"> <a style="text-decoration: none; color: black;" href="doctor_add.php"> Add Doctor </a> </button>

</body>
</html>