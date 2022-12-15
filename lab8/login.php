<?php

$sql = new mysqli("localhost", "root", "", "db");
if($sql -> connect_error){
    die("Connection error: " . $sql -> connect_error);
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $email = $_REQUEST['email'];
    $password = $_REQUEST['password'];
}

$q = "select name, surname from users where email = '" . $email . "' and password = '" . $password . "'" ;

$res = $sql -> query($q);


$count = mysqli_num_rows($res);

if($count === 1){
    $row = mysqli_fetch_assoc($res);
    echo "<br>Hello my friend!:  " . $row['name'] . "  " . $row['surname'];
}else{
    echo "Login or password incorrect!";
}

?>