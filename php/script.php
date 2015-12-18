<?php

add_new_item("1234","Super awesome","Something Interesting");

function connect_to_database()
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
  return $mysqliLink;
}

function get_now_date()
{
  date_default_timezone_set("Asia/Riyadh");
  $d=strtotime("now");
  return date("Y-m-d h:i:sa", $d);
}

function add_new_item($new_sku,$new_name,$new_description)
{
  $mysqliLink = connect_to_database();
  $sql = "SELECT * FROM items";
  $result = $mysqliLink->query($sql);
  $new_date = get_now_date();

  if ($result->num_rows > 0)
  {
      $not_unique_flag = false;
      // check if new sku is unique
      while($row = $result->fetch_assoc())
      {
        if($row["sku"] == $new_sku)
        {
          $not_unique_flag=true;
          echo '<script language="javascript">';
          echo 'alert("The entered sku (';
          echo $new_sku;
          echo  ') exists. Please enter a unique sku.");';
          echo '</script>';
          exit();
        }
          echo "id: " . $row["item id"]. " - sku: " . $row["sku"]. " name: " . $row["name"]. "<br>";
      }

      //if it makes it this far, that means it's that the sku is unique
      $sql = "INSERT INTO `items`(`sku`, `name`, `description`, `date added`) VALUES ('$new_sku','$new_name','$new_description','$new_date')";
      //$sql = "INSERT INTO `items`(`sku`,`item id`) VALUES ('ooh',9)";
      $result = $mysqliLink->query($sql);

  }
  else
  {
      echo "0 results";
  }

  $mysqliLink->close();
}

function add_new_category("new_name","new_initials")
{
  
}




?>
