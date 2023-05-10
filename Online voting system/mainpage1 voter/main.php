<?php
include 'connect.php';
session_start();
$id = $_SESSION['userdata'];
$sql = "SELECT * FROM `voter` WHERE VID=$id";
$result = mysqli_query($con,$sql);
$row = mysqli_fetch_assoc($result);
$vid = $row['VID'];
$vname = $row['VNAME'];
$age = $row['AGE'];
$gender = $row['GENDER'];
$address = $row['ADDRESS'];
//$CITY = $row['CITY'];
// echo '$_SESSION['$userdata']';
if(!isset($_SESSION['userdata'])){
 //  echo $_userdata['$VID'];
    // $id = $_SESSION['userdata'];
    // echo '$id';

}
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="trial.css">
    <style>
    .btn {
        float: right;
        padding: 5px;
        font-size: 15px;
        background-color: black;
        color: aliceblue;
        border-radius: 5px;
    }

    body {
        background: linear-gradient(135deg, #71b7e6, #9b59b6);
        margin=0;
        padding=0;
        ;
    }

    .profile {
        background-color: white;
        width: 30%;
        height: 15rem;
        padding: 20px;
        float: left;
        margin-left: 20px;
        padding-bottom: 100px;
    }

    .Group {
        background-color: white;
        width: 50%;
        height: 30rem;
        padding: 20px;
        margin-right: 50px;
        float: right;
    }

    #votebtn {
        float: right;
        padding: 5px;
        font-size: 15px;
        background-color: slateblue;
        color: aliceblue;
        border-radius: 5px;
    }

    .btn1{
        float: left;
        padding: 10px;
        font-size: 15px;
        background-color: black;
        color: white;
        margin: 20px;
        border-radius: 5px;
  }
    </style>
</head>

<body>
    <center>
        <div class="Mainsection">
            <div class="header section">
                <a href="../voter/login.php"><button  type="submit"class="btn">Logout</button></a>
                <h1>ONLINE VOTING SYSTEM</h1>
            </div>
    </center>
    <div class="profile">
        <h3>VOTER</h3>
        <b>Voter Name:</b><?php echo $vname?><br><br>
        <b>Voter ID:</b><?php echo $vid?><br><br>
        <b>Age:</b><?php echo $age?><br><br>
        <b>Gender:</b><?php echo $gender?><br><br>
        <b>Address:</b><?php echo $address?><br>';
    
    <button class="btn1">Update</button>
    </div>
    <div class="Group">
        <?php
    $sql = "SELECT * FROM `candidate`";
    $result = mysqli_query($con, $sql);
    if ($result) {
      $row = mysqli_fetch_assoc($result);
      
        $cid = $row['CID'];
        $cname = $row['CNAME'];
          echo '
          <b>Candidate Name:</b>'.$cid.'<br><br>
          <b>Candidate id:</b>'.$cname.'<br><br>
           <form action="">
             <input type="hidden" name="gvotes" values="">
             <input type="submit" name="votebtn" value="vote" id="votebtn">
           </form>';
      
    }
    ?>
        <hr>
    </div>

    </div>
</body>

</html>