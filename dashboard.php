<?php
session_start();

if (isset($_SESSION { 'login'})) {

} else {

  header('Location: food.php');

}


?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bootstrap demo</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>

  <div><a class="btn btn-success m-4" href="add product.php">Add New</a></div>

  <table class="table table-dark table-striped">
    <thead>
      <tr>
        <th scope="col">id</th>
        <th scope="col">image</th>
        <th scope="col">name</th>
        <th scope="col">price</th>
        <th scope="col">stock</th>
        <th scope="col">Edit</th>
        <th scope="col">Delete</th>

      </tr>
    </thead>
    <?php

    $serverAddress = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'fooddash';


    $con = new mysqli($serverAddress, $username, $password, $dbname);

    $sql = "SELECT * FROM product";

    $result = $con->query($sql);

    if ($result->num_rows > 0) {

      while ($row = $result->fetch_assoc()) {


        echo '  <tr>
    <th scope="row">1</th>
    <td><img src="' . $row['p_image'] . '" alt=""></td>
    <td>' . $row['p_name'] . '</td>
    <td>' . $row['p_price'] . '</td>
    <td>' . $row['p_stock'] . '</td>
    <td><button class="btn btn-info">Edit</button></td>
    <td><button class="btn btn-danger">Delete</button></td>
       </tr>
      ';
      }

    }



    ?>




  </table>







  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>
</body>

</html>