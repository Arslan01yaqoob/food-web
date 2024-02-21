<?php
$serverAddress = 'localhost';
$username = 'root';
$password = '';
$dbname = 'fooddash';


$con = new mysqli($serverAddress,$username,$password,$dbname);


$productData = array();

$sql ="SELECT * FROM product";

$result = $con ->query($sql);

if($result-> num_rows >0){

while($row = $result-> fetch_assoc()){


array_push($productData,$row);

}


echo json_encode($productData);

}








?>