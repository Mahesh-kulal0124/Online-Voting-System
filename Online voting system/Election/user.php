<?php
  include 'connect.php';
  if(isset($_POST['submit'])){
    $ENAME=$_POST['ENAME'];
    $EID=$_POST['EID'];
    $CITY=$_POST['CITY'];

    $sql = "INSERT INTO`Election`(ENAME,EID,CITY)
    values('$ENAME','$EID','$CITY')";
    $result = mysqli_query($con, $sql);
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
                <label>ELECTION NAME</label>
                <input type="text" class="form-control" placeholder="Enter election name" name="ENAME" autocomplete="off" required>
            </div>
            <div class="form-group">
                <label>EID</label>
                <input type="text" class="form-control" placeholder="Enter election id" name="EID" autocomplete="off" required>
            </div>
            <div class="form-group">
                <label>CITY</label>
                <input type="text" class="form-control" placeholder="Enter election city" name="CITY" required>
            </div>
            <BR></BR>
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>
    </div>

</body>

</html>