<?
session_start();
if(!isset($_SESSION['login'])){
  header('location: login.php');
}

require_once './dbcon.php';

?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title> Index </title>

    <!-- Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/font-awesome.min.css" rel="stylesheet">


  </head>
  <body>

    <nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">E-LEAGUE </a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">


      <ul class="nav navbar-nav navbar-right">

        <li> <a  href = "add_user.php"><i class="fa fa-user-plus"> </i>Add User</a> </li>
        <li> <a  href = "profile.php"> <i class="fa fa-user" aria-hidden="true"></i> Profile</a> </li>
        <li> <a  href = "logout.php"><i class="fa fa-power-off"> </i>Logout</a> </li>

      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>


<div class="col-sm-3">
  <div class="list-group">
  <a href="index.php" class="list-group-item active"> <i class="fa fa-dashboard"> </i> Dashboard </a>
  <a href="index.php" class="list-group-item "> <i class="fa fa-user"> </i> All User </a>
  <a href="add_user.php" class="list-group-item "> <i class="fa fa-user-plus"> </i> Add user </a>
  <a href="teams.php" class="list-group-item "> <i class="#"> </i> Teams </a>
  <a href="sponsor.php" class="list-group-item "> <i class="#"> </i> Sponsors </a>

  </div>
</div>


  <div class="col-sm-9">
    <div class="content">
      <h1 class="text-primary"><i class="fa fa-dashboard"> </i> Dashboard<small> Static overview</small> <h1>
        <ol class="breadcrumb">
        </ol>

        <div class="row">
          <div class="col-sm-4">
            <div class="panel panel-primary">
              <div class="panel-heading">
                <div class="row">
                  <div class="col-xs-3">
                    <i class="fa fa-users fa-5x"> </i>
                  </div>
                  <div class="col-xs-9">
                    <div class="pull-right" style="font-size: 45px"> 10</div>
                    <div class="clearfix"> </div>
                    <div class="pull-right">  </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>


      </hr>
      <h3> Total User </h3>

      <table class="table" border="1">
        <thead>
        <tr>
          <th> User ID </th>
          <th> Name </th>
          <th> Email </th>
          <th> Password </th>
          <th> Age </th>
          <th> Gender </th>
          <th> Date of Birth </th>
          <th> Team Name </th>
          <th> Action </th>
        </tr>
      </thead>


      <tr>


        <?php

        //global $con;
        require_once './dbcon.php';


        $db_sinfo = mysqli_query($link, "SELECT * FROM `users_info`");
        while($row = mysqli_fetch_assoc($db_sinfo)){ ?>

          <tr>

            <td> <?php echo $row['Id']; ?> </td>
            <td> <?php echo $row['name']; ?> </td>
            <td> <?php echo $row['email']; ?> </td>
            <td> <?php echo $row['password']; ?> </td>
            <td> <?php echo $row['age']; ?> </td>
            <td> <?php echo $row['gender']; ?> </td>
            <td> <?php echo $row['date_of_birth']; ?> </td>
            <td> <?php echo $row['team_name']; ?> </td>
            <td>
              <a href="update_user.php" class="btn btn-xs btn-warning"> <i class="fa fa-pencil"> </i> Edit </a>
              &nbsp;&nbsp;&nbsp;&nbsp;
              <a href="delete_user.php?id=<?php echo $row['Id']; ?>" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Delete <a>
            </td>

          </tr>




        <?php

      }


         ?>














      </tr>


      </table>

    </div>
  </div>
</div>


  </body>
</html>
