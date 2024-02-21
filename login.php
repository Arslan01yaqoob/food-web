<?php
session_start();

$serverAddress = 'localhost';
$username = 'root';
$password = '';
$dbname = 'learn';


$con = new mysqli($serverAddress, $username, $password, $dbname);


if (isset($_POST['name'])) {

    $name = $_POST['name'];
    $code = $_POST['code'];

    $sql = "SELECT * FROM `student-side` WHERE name='$name' AND code='$code'";

    $result = $con->query($sql);


    if ($result->num_rows > 0) {


        $row = $result->fetch_assoc();
        $_SESSION['login'] = $row['name'];


        header('Location :Home1.php');
        # code...
    } else {
        # code...
        echo '<div class="alert alert-danger" role="alert">
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
    <title>login page</title>
    <link rel="stylesheet" href="css/page.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>

<body>
    <div class="container-fluid">
        <!-- page start -->
        <div class="row first-page">
            <div class="row"></div>
            <div class="col-1"></div>
            <div class="col-3 name">
                <h1>Learn with Arslan</h1>
            </div>
            <div class="col-6"></div>
            <div class="col-2"> <button class="btn1">sign up</button></div>
            <div class="col-1"></div>
            <div class="col-6">
                <h1>Login now</h1>
                <p class="welcome">Hi,welcome back</p>

                <div class="col">
                    <button class="with-google">
                        <img src="images/goole.png" alt="Google Icon" class="icon">
                        Login with Google
                    </button>
                </div>
                <div class="row line">

                    <div class="col-4">
                        <hr>
                    </div>
                    <div class="col line-txt">
                        <p>Login with Email</p>
                    </div>
                    <div class="col-4">
                        <hr>
                    </div>
                </div>
                <div class="row"></div>

                <form method="POST" action="login.php">

                    <h5>Name</h5>
                    <div class="col">
                        <input type="text" name="name" class="getting-name" placeholder="Enter your Name"
                            aria-label="First name">
                    </div>

                    <h5>Code</h5>
                    <div class="col">
                        <div class="password-container">
                            <input type="password" name="code" class="getting-name" id="passwordInput"
                                placeholder="Enter Your Code" aria-label="Password">
                            <i class="fas fa-eye eye-icon" id="togglePassword"></i>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <label for="remember-me">Remember Me</label>
                            <input type="checkbox" id="remember-me"  value="remember-me">
                        </div>

                        <div class="col">
                            <p class="forgot-text">Forgot Password?</p>
                        </div>
                    </div>
                    <button type="submit" class="btn2">Login</button>
                </form>
                <p>
                    Not registered yet?
                    <span class="last-three-words">Create an Account</span>
                </p>


            </div>
            <div class="col-5"><img src="images/reshot-illustration-website-design-U3PZXDSEVY 1.png" alt=""></div>

            <!-- page end -->
        </div>



        <script src="js/page.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js
"></script>
</body>

</html>