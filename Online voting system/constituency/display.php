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
        a{
            text-decoration: none;
        }
    </style>
</head>
<body>
  <div class="container">
    <button class="btn btn-primary my-5">
    <a href="user.php" class="text-light">Add user</a>
    </button>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">CONSTITUENCY NAME</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $sql = "SELECT * from CONSTITUENCY";
    $result = mysqli_query($con, $sql);
    if ($result) {
      while ($row = mysqli_fetch_assoc($result)) 
      {
        $Cid = $row['CO_ID'];
        $Cname = $row['CO_NAME'];
        echo ' <tr>
      <th scope="row">' . $Cid . '</th>
      <td>' . $Cname . '</td>
      <td>
      <button class="btn btn-primary"><a href="update.php ? updateid='.$Cid.'"class="text-light">Update</a></button>
      <button class="btn btn-danger"><a href="delete.php? deleteid='.$Cid.'"class="text-light">Delete</a></button>
      </td></tr>';
      }
    }
    




    ?>
   
   
    <!-- <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td colspan="2">Larry the Bird</td>
      <td>@twitter</td>
    </tr> -->
  </tbody>
</table>
   
  </div>

</body>
</html>