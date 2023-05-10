<?php
include 'connect.php';
$id = $_GET['updateid'];
$sql = "SELECT * FROM `candidate` WHERE CID=$id";
$result = mysqli_query($con,$sql);
$row = mysqli_fetch_assoc($result);
$Cid = $row['CID'];
$Cname = $row['CNAME'];
$address = $row['ADDRESS'];
$age = $row['AGE'];
$gender = $row['GENDER'];
$partyname = $row['PARTYNAME'];
$vid = $row['VID'];


  if(isset($_POST['submit'])){
    $Cid = $_POST['CID'];
    $Cname =$_POST['CNAME'];
    $address =$_POST['ADDRESS']; 
    $age = $_POST['AGE'];
    $gender = $_POST['GENDER'];
    $partyname = $_POST['PARTYNAME'];
    $vid = $_POST['VID'];

    $sql = "UPDATE `candidate` SET CNAME='$Cname', ADDRESS='$address',AGE='$age',GENDER='$gender',PARTY_NAME='$partyname',VID='$vid
           WHERE CID=$Cid'";
    $result = mysqli_query($con,$sql);
    if($result){
        // echo "Data inserted successfully";
       header('location:./main.php');
    }
    else{
        die("Connection failed" . mysqli_connect_error());
    }
  }

?>






<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Crud operation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
   
</head>

<body>
    <div class="container my-5">
        <form method="post" action="update.php">
            <div class="form-group">
                <label>CNAME</label>
                <input type="text" class="form-control" placeholder="Enter candidate name" name="CNAME" autocomplete="off" value="<?php
                  echo $Cname ?>"required>
            </div>
            <div class="form-group">
                <label>CID</label>
                <input type="text" class="form-control" placeholder="Enter candidate id" name="CID" autocomplete="off"  value="<?php
                  echo $Cid?>"required>
            </div>
            <div class="form-group">
                <label>ADDRESS</ADDRESS></label>
                <input type="text" class="form-control" placeholder="Enter your address" name="ADDRESS" value="<?php
                  echo $address ?>" required>
            </div>
            <div class="form-group">
                <label>GENDER</label>
                <input type="text" class="form-control" placeholder="Enter your Gender" name="GENDER" autocomplete="off" value="<?php
                  echo $gender ?>"required>
            </div>
            <div class="form-group">
                <label>PARTY_NAME</label>
                <input type="text" class="form-control" placeholder="Enter your partyName"name="PARTY_NAME" autocomplete="off" value="<?php
                  echo $partyname ?>"required>
            </div>
            <div class="form-group">
                <label>Voterid</label>
                <input type="text" class="form-control" placeholder="Enter your voterid" name="VID" autocomplete="off" value="<?php
                  echo $vid ?>"required>
            </div>
            <div class="form-group">
                <label>AGE</label>
                <input type="text" class="form-control" placeholder="Enter your age" name="AGE" autocomplete="off" value="<?php
                  echo $age ?>"required>
            </div>
            <br>

            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>
    </div>

</body>

</html>