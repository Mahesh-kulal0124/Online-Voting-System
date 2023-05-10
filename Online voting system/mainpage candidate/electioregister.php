<?php
  include 'connect.php';
 $alert = false;
  if(isset($_POST['CID'])){
    $CID=$_POST['CID'];
    $EID=$_POST['EID'];
    $CO_ID=$_POST['CO_ID'];

    $sql = "insert into `CONTESTS`(CID,EID)
    VALUES ('$CID','$EID');";
    $result = mysqli_query($con, $sql);
    if ($result) {
        $sql1 = "insert into `heldfor`(CO_ID,EID)
        VALUES ('$CO_ID','$EID');";
        $result1 = mysqli_query($con, $sql1);
        if ($result1) {
            $alert = true;
           
        } else {
            die("Connection failed" . mysqli_connect_error());
        }
        $alert = true;
       // header("Location:/online%20voting/mainpage candidate/main.php");
        
        }
    else{
        die("Connection failed" . mysqli_connect_error());
       }
  }
 
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration page</title>
   <link rel="stylesheet" href="electionregister.css">
</head>
<body>

    <div class="Container">
    
    <div class="Action">Candidate Registration</div>
    <form action="electioregister.php" method="post">
        
        <div class="user-details">
            <div class="input-box">
                <span class="details">CANDIDATE ID</span>
                <input type="drop-down" placeholder="Enter candidate id" name="CID" required>
            </div>
            <div class="input-box">
                <span class="details">ELECTION ID</span>
                <input type="text" placeholder="Enter election id"name="EID" required>
            </div>
            <div class="input-box">
                <span class="details">CONSTITUENCY ID</span>
                <input type="text" placeholder="Enter constituency id" name="CO_ID"required>
            </div>
            
           </div>
           
           <div class="Button">
            <input type="submit" name="submit" value="Register"><br><br>
            <a href="/online%20voting/mainpage candidate/main.php"><button type="submit" class="back">Back</button></a>
        </div>
        </form>
   </div>
  <!-- </div> -->
  <?php
  if($alert)
  echo "<script>alert('Registration successfully')</script>"
  ?>
</body>
</html>