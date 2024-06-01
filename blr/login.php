<?php
session_start();
include "connection.php";

if(isset($_POST['submit'])){

    $email=$_POST['fmail'];
    $pass=$_POST['fpass'];

    $sql="select * from signuptable where email='$email' and status='active'";

    $res=mysqli_query($conn,$sql);

    if(mysqli_num_rows($res)>0){

        $row=mysqli_fetch_assoc($res);

        $password=$row['password'];

        // echo $password;

        // die();


        $decrypt=password_verify($pass,$password);


        if($decrypt){
            $_SESSION['name']=$row['name'];
            header("location: home.php");


        }else{
            echo "invalid password";
        }

        // var_dump($decrypt);

        // die();



    }else{
        echo "kch bhi nahi mil r h";

    }


}


?>

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
    <p>

    <?php if(isset($_SESSION['message'])){
        echo $_SESSION['message'];
    } else{
        echo $_SESSION['message']="you are logged out";
    }
    
    
    ?>

    </p>
    <div class="row">
        <div class="col-6">
        <form action="" method="post">

  
  <div class="form-group">
    <label>Email address</label>
    <input type="email" name="fmail" class="form-control" aria-describedby="emailHelp" placeholder="Enter email">
    <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
  </div>
 
  <div class="form-group">
    <label for="exampleInputPassword1" >Password</label>
    <input type="password" class="form-control" name="fpass" id="exampleInputPassword1" placeholder="Password">
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