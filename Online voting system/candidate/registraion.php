<?php
  include 'connect.php';
 $alert = false;
  if(isset($_POST['CID'])){
    $CID=$_POST['CID'];
    $CNAME=$_POST['CNAME'];
    $ADDRESS=$_POST['ADDRESS'];
    $GENDER=$_POST['Gender'];
    $AGE=$_POST['AGE'];
    $PARTY_NAME=$_POST['PARTY_NAME'];
    $VID=$_POST['VID'];

    $sql = "insert into `candidate`(CID,CNAME,ADDRESS,AGE,GENDER,PARTY_NAME,VID)
    VALUES ('$CID','$CNAME','$ADDRESS','$AGE','$GENDER','$PARTY_NAME','$VID');";
    $result = mysqli_query($con, $sql);
    if($result){
        $alert = true;
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
   <link rel="stylesheet" href="registration.css">
</head>
<body>
    <div class="Container">
    <div class="Action">Candidate Registration</div>
    <form action="registration.php" method="post">
        <div class="user-details">
            <div class="input-box">
                <span class="details">Full Name</span>
                <input type="text" placeholder="Enter your name" name="CNAME" required>
            </div>
            <div class="input-box">
                <span class="details">Age</span>
                <input type="number" placeholder="Enter your age"name="AGE" required>
            </div>
            <div class="input-box">
                <span class="details">Candidate ID</span>
                <input type="number" placeholder="Enter your Candidate ID" name="CID"required>
            </div>
            <div class="input-box">
                <span class="details">Address</span>
                <input type="text" placeholder="Enter your Address" name="ADDRESS" required>
            </div>
            <div class="input-box">
                <span class="details">Party name</span>
                <input type="text" placeholder="Enter your party name"name="PARTY_NAME" required>
            </div>
            <div class="input-box">
                <span class="details">Voter ID</span>
                <input type="number" placeholder="Enter your Candidate ID" name="VID" required>
            </div>
           </div>
           <div class="Gender-etails">
            <input type="radio" name="Gender" id="dot-1">
            <input type="radio" name="Gender" id="dot-2">
            <input type="radio" name="Gender" id="dot-3">
            <span class="gender-title">Gender</span>
            <div class="category">
                <label for="dot-1">
                 <span class="dot one"></span>
                 <span class="gender">Male</span>
                </label>
                <label for="dot-2">
                    <span class="dot two"></span>
                    <span class="gender">Female</span>
                </label>
                <label for="dot-3">
                    <span class="dot three"></span>
                    <span class="gender">Other</span>
                </label>
            </div>
           </div>
           <div class="Button">
            <input type="submit" name="submit" value="Register">
        </div>
        </form>
        <p>have an account ?</p>
        <a href="./Login.html">Login</a>
   </div>
  <!-- </div> -->
  <?php
  if($alert)
  echo "<script>alert('Data inserted successfully')</script>"
  ?>
</body>
</html>