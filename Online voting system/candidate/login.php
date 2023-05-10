<?php
session_start();
include 'connect.php';
     $found = TRUE;
     $correct = TRUE;
     $temp = FALSE;
     if(isset($_POST['usrid'])){
             $id = $_POST['usrid'];
             $pass = $_POST['password'];
            $_SESSION['userdata'] = $id;
         $query = "SELECT  * FROM `candidate` WHERE CID= '$id';";
         $result = mysqli_query($con, $query);
         $row = mysqli_fetch_assoc($result);
         if(mysqli_num_rows($result) > 0){
         if(strcmp($row['CID'],$id) != 0)
            $found = FALSE;
         else{
            $query = "SELECT CID,PASSWORD FROM `CANDIDATE` WHERE CID= '$id';";
            $result = mysqli_query($con, $query);
            $row = mysqli_fetch_assoc($result);

            if($row['PASSWORD'] != $pass)
                $correct = FALSE;
            else{
                $correct = TRUE;
                $_SESSION['userdata'] = $id;
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
    <title>Login form</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="center">
        <h1>Candidate Login</h1>
        <form action="login.php" method="post">
        <div class="Text_field">
            <input type="text"  id="userid" name="usrid" autocomplete="off" required>
            <label for="userid">USER ID:</label>
        </div>
        <?php
           if(!$found)
           echo "<p><i>*user id not found</i><p>";
       else
           echo "<p></p>";
         ?>
        <div class="Text_field">
            <input type="password" id="password" name="password" autocomplete="off" required>
            <label for="password">PASSWORD:</label>
        </div>
        <?php
                if(!$correct)
                    echo "<p><i>*password is incorrect</i></p>";
                else
                    echo "<p></p>";
        ?>
        <input type="submit" value="Login">
        <div class="login">
            Don't have an account ?
            <a href="./registration.php">Register here</a>
        </div>
       
        </form>
    </div>
</body>
</html>