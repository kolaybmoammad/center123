<?php
include_once("connection/connect.php");
if(isset($_POST["submit"])){


$phone= $_POST["phone"];
$email= $_POST["email"];
$specialization= $_POST["specialization"];
$salary= $_POST["salary"];
$Name= $_POST["name"];
$address= $_POST["address"];


$insert_query="insert into teacher(phone,specialization,salary,email,fullname,addres)
 values(".$phone.",".$specialization.",'".$salary."','".$email."','".$Name."','".$address."')";
 $result = mysqli_query($connexion, $insert_query);


 if($result){
    echo "data inserted successfully";
    header('location:index.php');

 }

// echo $insert_query;

}




?>