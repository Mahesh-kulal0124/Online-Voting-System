<?php
include 'connect.php';
$id = $_GET['updateid'];
$sql = "SELECT * FROM `ELECTION` WHERE EID=$id";
$result = mysqli_query($con,$sql);
$row = mysqli_fetch_assoc($result);
$Eid = $row['EID'];
$Ename = $row['ENAME'];
$CITY = $row['CITY'];

  if(isset($_POST['Submit'])){
    $ENAME=$_POST['ENAME'];
    $EID = $_POST['EID'];
    $CITY=$_POST['CITY'];

    $sql = "UPDATE `ELECTION` SET EID='$EID', ENAME='$ENAME', CITY='$CITY' WHERE EID='$EID'";
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
                <label>ENAME</label>
                <input type="text" class="form-control" placeholder="Enter election name" name="ENAME" autocomplete="off" value="<?php
                  echo $Ename ?>"required>
            </div>
            <div class="form-group">
                <label>EID</label>
                <input type="text" class="form-control" placeholder="Enter election id" name="EID" autocomplete="off"  value="<?php
                  echo $Eid?>"required>
            </div>
            <div class="form-group">
                <label>CITY</label>
                <input type="text" class="form-control" placeholder="Enter election city" name="CITY" value="<?php
                  echo $CITY ?>" required>
            </div>
            <br>

            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>
    </div>

</body>

</html>