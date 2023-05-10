<?php
include 'connect.php';
$id = $_GET['updateid'];
$sql = "SELECT * FROM `CONSTITUENCY` WHERE CO_ID=$id";
$result = mysqli_query($con,$sql);
$row = mysqli_fetch_assoc($result);
$Cid = $row['CO_ID'];
$Cname = $row['CO_NAME'];

  if(isset($_POST['Submit'])){
    $CNAME=$_POST['CNAME'];
    $CID = $_POST['CID'];

    $sql ="UPDATE `CONSTITUENCY` SET CID='$CID', CO_NAME='$CNAME' WHERE CO_ID='$CID'";
    $result = mysqli_query($con,$sql);
    if($result){
        // echo "Data inserted successfully";
       header('location:display.php');
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
        <form method="post">
            <div class="form-group">
                <label>CONSTITUENCY NAME</label>
                <input type="text" class="form-control" placeholder="Enter constituencyname" name="CNAME" autocomplete="off" value="<?php
                  echo $Cname ?>"required>
            </div>
            <div class="form-group">
                <label>CONSTITUENCY ID</label>
                <input type="text" class="form-control" placeholder="Enter constituency id" name="CID" autocomplete="off"  value="<?php
                  echo $Cid?>"required>
            </div>
           <br>

            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>
    </div>

</body>

</html>