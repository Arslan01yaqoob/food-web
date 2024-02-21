<?php
session_start();

$serverAddress = 'localhost';
$username = 'root';
$password = '';
$dbname = 'fooddash';


$con = new mysqli($serverAddress,$username,$password,$dbname);


if( isset($_POST['email'])){

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM iadmin WHERE email='$email' AND password='$password'";

$result = $con->query($sql);


if ($result -> num_rows > 0) {


$row = $result->fetch_assoc();
$_SESSION['login'] = $row['email'];

(0 )
    # code...
} else {
    # code...
    echo'<div class="alert alert-danger" role="alert">
    invalid email/password
  </div>';
}
}




?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="page.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css
    ">
</head>

<body>


    <div class="container">
        <div class="row">
            <div class="col-4"><img class="im" src="images/download.jpeg" alt=""></div>

            <div class="col-6">
                <form method="POST" action="food.php">
                    <h4>logo</h4>
                    <div class="form-floating mb-3">
                        <input name="email" type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                        <label for="floatingInput">Email address</label>
                    </div>
                    <div class="form-floating">
                        <input name ="password" type="password" class="form-control" id="floatingPassword" placeholder="Password">
                        <label for="floatingPassword">Password</label>
                    </div>
                    <button type="submit" >login</button>
                </form>
            </div>

        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js
    "></script>
</body>

</html>



