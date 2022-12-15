<?php

$sql = new mysqli("localhost", "root", "", "db");
if($sql -> connect_error){
    die("Connection error: " . $sql -> connect_error);
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $name = $_REQUEST['name'];
    $surname = $_REQUEST['surname'];
    $email = $_REQUEST['email'];
    $password = $_REQUEST['password'];
}
if($name !== "" and $surname !== "" and $email !== "" and mb_strlen($password) >= 8){
    $q = "Insert into users ( `name`, `surname`, `email`, `password`) values( '" . $name . "','"  . $surname . "','"  . $email . "','"  . $password . "')";    
}else{
    $q = "error";
}


if($q === "error"){
    echo "Record is not created";
}else if ($sql->query($q) === TRUE) {
    include("login.html");
}else {
    echo "Error: " . $q . "<br>" . $sql->error;
  }
  
  $sql->close();
?>