<?php
include_once("connection/connect.php");
if(isset($_POST["submit"])){
  $id= $_POST["id"];
  $phone= $_POST["phone"];
  $email= $_POST["email"];
  $educ_level= $_POST["educ_level"];
  $age= $_POST["age"];
  $Name= $_POST["name"];
  $address= $_POST["address"];

$insert_query="update students set phone='".$phone."',email='".$email."',
educ_level='".$educ_level."',age=".$age." ,email='".$email."',
name='".$Name."',address='".$address."' where id=".$id ;
  $result = mysqli_query($connexion, $insert_query);


  if($result){
    echo "data inserted successfully";
    header('location:./index.php?page=students');

  }

// echo $insert_query;

}




?>