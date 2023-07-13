<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title> Team Info </title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->


  </head>

  <body>


    <br>


    <div class="row">
      <div class="col-sm-4 col-sm-offset-4">
        <form action="" method="POST">
          <table class= "table table-bordered style="width:100%" ">


              <th class="text-center" style="background-color:#ff6347;"><lebel for="roll"> Sponsor: </lebel> </th>  <!-- roll will become password-->
            </tr>

            <tr>
            <th> Sponsor Name </th>
            <th> Country </th>
            <th> Company_type </th>


            </tr>



            <tr> <?php


            require_once './dbcon.php';


              $db_sinfo = mysqli_query($link, "SELECT * FROM Sponsor");

              while($row =  mysqli_fetch_assoc($db_sinfo)){ ?>

                <tr>
                  <td class="text-center"> <?php echo $row['Sponsor_name']; ?> </td>
                  <td class="text-center"> <?php echo $row['country']; ?> </td>
                  <td class="text-center"> <?php echo $row['company_type']; ?> </td>



                </tr> <?php
              }
              ?>



            </tr>

          </table>

        </form>


            </div>
          </div>







    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
