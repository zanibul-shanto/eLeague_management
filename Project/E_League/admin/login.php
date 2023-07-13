<?php

require_once './dbcon.php';
session_start();

if(isset($_SESSION['login'])){
  header('location: index.php');
}


if(isset($_POST['login'])){
  $email = $_POST['email'];
  $password = $_POST['password'];

  $email_check = mysqli_query($link, "select * from `admins` where `email` = '$email' ");
  $pas_check = mysqli_query($link, "select * from `admins` where `password` = '$password' ");

  if(mysqli_num_rows($email_check) > 0){

    $row = mysqli_fetch_assoc($email_check);

    if(mysqli_num_rows($pas_check) > 0){
      $_SESSION['login'] = $email;
      header('location: index.php');
    }
    else {
      $wrong_password = "worng pass";
      echo "NO";

    }


  }
  else {
    $email_not_found = "Email not found";
    echo "not found";
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
    <title>E-League</title>

    <!-- Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/animate.css" rel="stylesheet">


  </head>
  <body>
    <div class = "container animated shake">

      <h1 class= "text-center">E-League </h1>
      <br>
      <div class ="row">
      <div class="col-sm-4 col-sm-offset-4">
        <h2 class= "text-center"> Admin Login Form </h2>
        <form action="login.php" method="POST">
          <div>
            <input type="text" placeholder= "Email" name ="email" required = "" class="form-control" value= "<?php if(isset($email)) {echo $email;} ?>"  />
          </div>
          <div>
            <input type="text" placeholder= "password" name = "password" required = "" class="form-control" value= "<?php if(isset($password)) { echo $password;}?>"   />
          </div>
          <br>
          <div>
            <input type="submit" value="Login" name= "login" class="btn btn-info pull-right" />
          </div> <a href="../"> Back </a>
        </form>
      </div>
    </div>

    <br>
    <?php if (isset($email_not_found)){
        echo '<div class= "alert alert-danger col-sm-4 col-sm-offset-4"> '.$email_not_found.'</div>';}
      ?>

    <?php if (isset($wrong_password)){
        echo '<div class= "alert alert-danger col-sm-4 col-sm-offset-4"> '.$wrong_password.'</div>';}
      ?>

  </div>


    </div>
  </body>
</html>
