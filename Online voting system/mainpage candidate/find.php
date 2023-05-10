<?php
  include 'connect.php';
 session_start();
    $found = TRUE;
     $correct = TRUE;
     $temp = FALSE;
if (isset($_POST['EID'])) {
    $EID = $_POST['EID'];
    $CO_ID = $_POST['CO_ID'];
    $_SESSION['userdata1'] = $EID;
    $_SESSION['userdata2'] = $CO_ID;
    $query = "SELECT  * FROM `HELDFOR` WHERE EID= '$EID';";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($result);
    if(mysqli_num_rows($result) > 0){
    if((strcmp($row['EID'],$EID) != 0) and( strcmp($row['CO_ID'],$CO_ID) != 0 ))
       $found = FALSE;
    else{
       $query = "SELECT EID,CO_ID FROM `HELDFOR` WHERE CO_ID= '$CO_ID' AND EID = '$EID';";
       $result = mysqli_query($con, $query);
       $row = mysqli_fetch_assoc($result);

       if(($row['EID'] != $EID)AND ($row['CO_ID']!=$CO_ID))
           $correct = FALSE;
       else{
           $correct = TRUE;
           $_SESSION['userdata1'] = $EID;
           $_SESSION['userdata2'] = $CO_ID;
           header("Location:/online%20voting/mainpage candidate/main.php");
           exit;
       }
} 
$con -> close();
}else
$found = FALSE;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Find</title>
    <link rel="stylesheet" href="find.css">
</head>
<body>
    <div class="center">
        <h1>Find Candidate</h1>
        <form action="find.php" method="post">
        <div class="Text_field">
            <input type="text"  id="userid" name="EID" autocomplete="off" required>
            <label for="userid">ELECTION ID:</label>
        </div>
        <?php
           if(!$found)
           echo "<p><i>*user id not found</i><p>";
       else
           echo "<p></p>";
         ?>
        <div class="Text_field">
            <input type="text" id="password" name="CO_ID" autocomplete="off" required>
            <label for="password">CONSTITUENCY ID:</label>
        </div>
        <?php
                if(!$correct)
                    echo "<p><i>*password is incorrect</i></p>";
                else
                    echo "<p></p>";
        ?>
        <input  type="submit" name="find" value="Find">
       </form>
    </div>
</body>
</html>