<?php
  $link = mysqli_connect("localhost", "root", "", "E_League");

  if($link){
    echo 'DB Connected!';
  }
  else {
    echo 'DB Not Connected!';
  }

 ?>
