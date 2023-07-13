<?php

require_once './dbcon.php';

  if(isset($_POST['registration'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];


    $input_error = array();

    if(empty($name)){
      $input_error['name'] = 'This field is required!';
    }

    if(empty($email)){
      $input_error['email'] = 'This field is required!';
    }

    if(empty($password)){
      $input_error['password'] = 'This field is required!';
    }

    print_r($input_error);

    if(count($input_error) == 0){
      $email_check = mysqli_query($link, "SELECT * FROM `admins` where `email` = '$email'; ");

      if(mysqli_num_rows($email_check) == 0){
        $query = "INSERT INTO `admins`(`name`, `email`, `password`) VALUES ('$name', '$email', '$password')";
        $result = mysqli_query($link, $query);

          if($result){
            $_SESSION['data_insert_success'] = "Data insert successfull!";
          }
          else{
            $_SESSION['data_insert_error'] = "Data insert is not successfull!";
          }
        }
      }
      else {
        $email_error = "Email already exist!";
      }


  }
 ?>






<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Admin Registration</title>

    <!-- Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/animate.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="style.css" media= "all" >


  </head>
  <body>

    <div class="container">
    <h1> User registration form </h1>
    <?php if(isset($_SESSION['data_insert_success'])){echo '<div class="alert alert-success">' .$_SESSION['data_insert_success'].' </div>';} ?>
    <?php if(isset($_SESSION['data_insert_error'])){echo '<div class="alert alert-warning">' .$_SESSION['data_insert_error'].' </div>';}  ?>


    <hr />
    <div class="row">
      <div class = "col-md-12">
        <form action="" method="POST" enctype="multipart/form-data" class= "form-horizontal">
          <div class= "form-group">
            <label for= "name" class="control-label col-sm-1"> Name: </label>
            <div class="col-sm-4">
              <input class="from-control" id="name" name= "name" placeholder="Enter your name" value="<?php if(isset($name)) {echo $name;} ?>"/>
            </div>


          <label class="error">
          <?php
          if(isset($input_error['name']))
          { echo $input_error['name'];}
          ?>
          </label>
          </div>

          <div class= "form-group">
            <label for= "email" class="control-label col-sm-1"> Email: </label>
            <div class="col-sm-4">
              <input class="from-control" id="email" name= "email" placeholder="Enter your email" value="<?php if(isset($email)) {echo $email;} ?>" />
            </div>
            <label class="error">
            <?php
            if(isset($input_error['email']))
            { echo $input_error['email'];}
            ?>
            </label>
            <label class="error"> <?php if(isset($email_error)){echo $email_error;} ?> </label>
          </div>

          <div class= "form-group">
            <label for= "password" class="control-label col-sm-1"> Password: </label>
            <div class="col-sm-4">
              <input class="from-control" id="password" name= "password" placeholder="Enter your password" value="<?php if(isset($password)) {echo $password;} ?>"/>
            </div>
            <label class="error">
            <?php
            if(isset($input_error['password']))
            { echo $input_error['password'];}
            ?>
            </label>
          </div>

          <div class="col-sm-4 col-sm-offset-1">
            <input type="submit" value="Registration" name= "registration"/>

          </div>
          </form>

            <br>
            <br>
            <br>
            <p> If you have an account? Then please <a href="login.php"> Login </a> </p>


<br> <br>
          <footer>
            <hr>
          <p> Copyright by Zanibul 2021. </p>
          </footer>




    </div>

  </body>
</html>
