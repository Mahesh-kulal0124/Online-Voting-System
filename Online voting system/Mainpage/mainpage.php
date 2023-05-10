<?php
include 'connect.php';


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online voting System</title>
    <link rel="stylesheet" href="Mainpage.css">
</head>

<body>
    <div class="Header section">
    <ul>
        <li><a href="#">Home</a></li>
        <li><a href="#">Result</a></li>
       <button class="button">Logout</button>
    </ul>
        <h1>ONLINE VOTING SYSTEM</h1>
        </div>
        <div class="vote">
  </div>
  <?php
    $sql = "select * from Voter";
    $result = mysqli_query($con, $sql);
    if ($result) {
      $row = mysqli_fetch_assoc($result);
      
        $vid = $row['VID'];
        $name = $row['VNAME'];
        $age = $row['AGE'];
        $gender = $row['GENDER'];
        $address = $row['ADDRESS'];
          echo '  <div class="profile">
        <h3>VOTER</h3>
        <b>Voter Name:</b>'.$name.'<br><br>
        <b>Voter ID:</b>'.$vid.'<br><br>
        <b>Age:</b>'.$age.'<br><br>
        <b>Gender:</b>'.$gender.'<br><br>
        <b>Address:</b>'.$address.'<br>
        </div>';
      
    }
    ?>
</body>
</html