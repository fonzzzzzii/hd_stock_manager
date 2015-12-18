<?php

connectToDB();

function connectToDB()
{
  $mysqliLink = new mysqli("localhost","root","","hd_stock_manager");

  if(mysqli_connect_errno())
  {
    echo "Not Connected<br>";
    exit();
  }
  else
  {
    echo "Connected<br>";
  }
/*
  //$sql = "INSERT INTO `items`(`sku`, `name`, `description`) VALUES ('fawzi','ffff','asdf')";
  $sql = "SELECT * FROM items";
  $result = $mysqliLink->query("SELECT * FROM items", MYSQLI_USE_RESULT)
  if ($mysqliLink->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $mysqliLink->error;
}*/

$sql = "SELECT * FROM items";
$result = $mysqliLink->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["item id"]. " - sku: " . $row["sku"]. " name: " . $row["name"]. "<br>";
    }
} else {
    echo "0 results";
}
$mysqliLink->close();

}
 ?>
