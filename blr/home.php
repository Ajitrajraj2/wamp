<?php
session_start();


if(isset($_SESSION['name'])){

    echo  "hello \n" .$_SESSION['name'];

}else{
    header("location: login.php");
}




?>

<button><a href="logout.php">logout</a></button>