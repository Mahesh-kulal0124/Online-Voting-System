<?php
include 'connect.php';
session_start();
$id = $_SESSION['userdata'];
$EID= $_SESSION['userdata1'];
$CO_ID= $_SESSION['userdata2'];
$sql = "SELECT * FROM `candidate` WHERE CID=$id";
$result = mysqli_query($con,$sql);
$row = mysqli_fetch_assoc($result);
$cid = $row['CID'];
$cname = $row['CNAME'];
$age = $row['AGE'];
$gender = $row['GENDER'];
$address = $row['ADDRESS'];
$party_name = $row['PARTYNAME'];
$vid = $row['VID'];
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="main.css">
    
</head>
<body>
    <center>
        <div class="Mainsection">
            <div class="header section">
            <ul>
            <li> <a href="electioregister.php"><button  type="submit" class="btn">Register</button></a></li>
            <li> <a href="display.php"><button  type="submit" class="btn">Display</button></a></li>
            <li> <a href="find.php"><button  type="submit" class="btn">Find</button></a></li>
             <li><a href="../candidate/login.php"><button  type="submit"class="btn">Logout</button></a></li>
            </ul>
                <h1>ONLINE VOTING SYSTEM</h1>
        </div>
    </center>
</div>
    <div class="profile">
        <h3>Candidate</h3>
        <b>Candidate Name:</b><?php echo $cname?><br><br>
        <b>Candidate ID:</b><?php echo $cid?><br><br>
        <b>Age:</b><?php echo $age?><br><br>
        <b>Gender:</b><?php echo $gender?><br><br>
        <b>Address:</b><?php echo $address?><br><br>
        <b>Party_name:</b><?php echo $party_name?><br><br>
        <b>Voter id:</b><?php echo $vid?><br><br>
    
        <?php echo'<button class="btn btn-primary"  ><a href="update.php ? updateid='.$cid.'"class="text-light">Update</a></button>'?>
    </div>
    <div class="Group">
        <?php
        $sql = "SELECT C.CID,C.CNAME
            FROM `CANDIDATE` C,`ELECTION` E,`CONTESTS` CO,`HELDFOR` H
            WHERE H.CO_ID='$CO_ID' AND H.EID='$EID' AND H.EID=E.EID AND E.EID=CO.EID AND CO.CID=C.CID;";
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
        
    </div>

    </div>
</body>

</html>