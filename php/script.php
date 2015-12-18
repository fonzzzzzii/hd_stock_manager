<?php

connectToDB();

function connectToDB()
{
  $mysqliLink = new mysqli("localhost","root","","hd_stock_manager");

  if(mysqli_connect_errno())
  {
    echo "Not Connected";
    exit();
  }
  else
  {
    echo "Connected";
  }
}

 ?>
