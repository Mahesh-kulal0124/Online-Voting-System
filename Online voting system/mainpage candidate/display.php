<?php
 include 'connect.php';
 ?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Crud operation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <style>
    a {
        text-decoration: none;
    }
    </style>
</head>

<body>
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Eelection Id</th>
                    <th scope="col">Election name</th>
                    <th scope="col">Constituency id</th>
                    <th scope="col">Constituency name</th>
                </tr>
            </thead>
            <tbody>
                <?php
    $sql = "SELECT EID,ENAME
            FROM `ELECTION` ";
    $result = mysqli_query($con, $sql);
    if ($result) {
      while ($row = mysqli_fetch_assoc($result)) 
      {
        $Eid = $row['EID'];
        $Ename = $row['ENAME'];
        $sql1 = "SELECT CO_ID,CO_NAME
        FROM `CONSTITUENCY` ";
     $result1 = mysqli_query($con, $sql1);
    if ($result1)
 {
     while ($row = mysqli_fetch_assoc($result1)) 
    {
      $Coid = $row['CO_ID'];
      $Cname = $row['CO_NAME'];
    
    echo ' <tr>
  <th scope="row">' . $Eid . '</th>
  <td>' . $Ename . '</td>
  <td>' . $Coid . '</td>
  <td>' . $Cname . '</td>
  <td>
  </td></tr>';
  }
}
      }
    }
    ?>


            </tbody>
        </table>

    </div>

</body>

</html>