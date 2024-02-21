<?php
session_start();

if(isset($_SESSION{'login'})){

}else{
    header('Location: food.php');
}


$serverAddress = 'localhost';
$username = 'root';
$password = '';
$dbname = 'fooddash';
$con = new mysqli($serverAddress,$username,$password,$dbname);



if(isset($_POST['Name'])){
$name = $_POST['Name'];
$price = $_POST['price'];
$stock = $_POST['stock'];


$fileName = $_FILES['image']['name'];
$fileSize = $_FILES['image']['size'];
$fileType = $_FILES['image']['type'];
$fileData = $_FILES['image']['tmp_name'];

echo 'loading';

$t = time();
if($fileType == 'image/jpg' || $fileType == 'image/png' || $fileType == 'image/jpeg'){

    
    move_uploaded_file( $fileData, 'images/'.$t.$fileName );
}

$imagePath = 'images/'.$t.$fileName;

$dateTime = date('Y-m-d H:m:s');

 $sql2 = "INSERT INTO product(`p_name`,`p_price`,`p_stock`,`p_image`,`created_at`) VALUES ('$name','$price','$stock','$imagePath','$dateTime')";
 if($con->query($sql2) == TRUE){
 echo'update';

 } else{
     echo'something went wrong';
 }

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


    <div class="row">
        <div class="col-2"></div>
        <div class="col">
            <div class="row g-3">


                <h1>input your product detail</h1>

                <form method="POST" action="add product.php" enctype="multipart/form-data">

                    <div class="col">
                        <input type="file" class="form-control" placeholder="image" name="image" aria-label="image">
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" placeholder="Name" name="Name" aria-label="Last name">
                    </div>
                    <div class="col">
                        <input type="number" class="form-control" placeholder="price" name="price" aria-label="price">
                    </div>
                    <div class="col">
                        <input type="number" class="form-control" placeholder="Name" name="stock" aria-label="stock">
                    </div>

                    <button type="submit" class="btn btn-secondary">submit</button>
                </form>
            </div>

        </div>
        <div class="col-2"></div>





    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>