<!doctype html>
<html lang="en">

<head>
  <title>Title</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body>
  <header>
    <!-- place navbar here -->
  </header>
  <main>
<div class="container py-3">
    <div class="row">
        <div class="col-6">
        <form action="" method="post">

        <div class="form-group">
    <label>Name</label>
    <input type="text" name="fname" class="form-control" aria-describedby="emailHelp" placeholder="Enter Name">
    <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
  </div>
  <div class="form-group">
    <label>Email address</label>
    <input type="email" name="fmail" class="form-control" aria-describedby="emailHelp" placeholder="Enter email">
    <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
  </div>
  <div class="form-group">
    <label>Mobile</label>
    <input type="number" class="form-control" name="fmobile" aria-describedby="emailHelp" placeholder="Enter mobile">
    <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1" >Password</label>
    <input type="password" class="form-control" name="fpass" id="exampleInputPassword1" placeholder="Password">
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1" >Confrim Password</label>
    <input type="password" class="form-control" name="fcpass" id="exampleInputPassword1" placeholder="Password">
  </div>
  <!-- <div class="form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div> --></br>
  <button type="submit" class="btn btn-primary" name="submit">Submit</button>
</form>
        </div>
    </div>
</div>
  </main>
  <footer>
    <!-- place footer here -->
  </footer>
  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
</body>

</html>

<?php

session_start();

include "connection.php";

if(isset($_POST['submit'])){

$name=$_POST['fname'];
$email=$_POST['fmail'];
$mobile=$_POST['fmobile'];
$pass=$_POST['fpass'];
$cpass=$_POST['fcpass'];


$check="select * from signuptable where email='{$email}'";

$res=mysqli_query($conn,$check); //executing query

$passwd=password_hash($pass,PASSWORD_DEFAULT); //PASSWORD ENCRYPTION

$key=bin2hex(random_bytes(12));


// $row=mysqli_fetch_assoc($res);

// $_SESSION['username']=$row['name'];

// echo $key;

// echo $passwd;





if(mysqli_num_rows($res)>0){
    echo "email already exists";


// echo $_SESSION['username'];

// die();

}else{

    if($pass===$cpass){

        $sql="insert into signuptable(name,email,mobile,password,token,status) values('$name','$email','$mobile','$passwd','$key','inactive')";

        $result=mysqli_query($conn,$sql);

            if($result){

                $to=$email;
                $subject="activation mail";
                $body="Hello $name, click here to activate account: http://localhost/blr/activation.php?key=$key";
                $sender="From: mohammadkashifsiddiqui2020@gmail.com";

                if(mail($to,$subject,$body,$sender)){
                    $_SESSION['message']="check your email to activate your account";
                    header("location: login.php");
                }else{
                    echo "email not sent";
                }

            }else{
                echo "query failed";
            }




    }else{
        echo "enter same password";
    }



}



}








?>