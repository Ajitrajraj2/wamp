<?php

session_start();

include "connection.php";

if(isset($_GET['key'])){

    $key=$_GET['key'];

    $query="update signuptable set status='active' where token='$key'";

    $res=mysqli_query($conn,$query);

    if($res){
        if(isset($_SESSION['message'])){
            $_SESSION['message']="account activated";
            header("location: login.php");
        }else{
            $_SESSION['message']="logged out";
            header("location: login.php");
        }
        
    }else{
        $_SESSION['message']="not activated";
        header("location: signup.php");
    }





}



?>