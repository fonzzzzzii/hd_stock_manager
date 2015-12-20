<?php
/*add_new_category('Sensors','sn');
add_new_category('Breadboards','pb');
add_new_category('Shields','sh');
add_new_category('LEDs','ld');
add_new_category('Microcontrollers','mc');
add_new_category('Switches','sw');
add_new_category('Motors','mo');
add_new_category('Power Supplies','ps');
add_new_category('Communication','co');
add_new_category('ICs','ic');
add_new_category('Display','ds');
add_new_category('Componenets','cm');
add_new_category('Wires and connections','wc');
add_new_category('Breakout','bk');
add_new_category('Sockets and conectors','sc');
add_new_category('Motor couplers','mk');
add_new_category('Bearing','br');
add_new_category('Belts and pulleys','bp');
add_new_category('Screws & nuts','su');
add_new_category('Heat sinks','hs');
add_new_category('Dill bits and & end mills','dm');*/



function connect_to_database()
{
  $mysqliLink = new mysqli("localhost","root","","hd_stock_manager");

  if(mysqli_connect_errno())
  {
    //echo "Not Connected<br>";
    exit();
  }
  else
  {
    //echo "Connected<br>";
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
      // check if new sku is unique
      while($row = $result->fetch_assoc())
      {
        if($row["sku"] == $new_sku)
        {
          echo '<script language="javascript">';
          echo 'alert("The entered sku (';
          echo $new_sku;
          echo  ') exists as ';
          echo $row["item name"];
          echo '. Please enter a unique sku.");';
          echo '</script>';
          exit();
        }
          echo "id: " . $row["item id"]. " - sku: " . $row["sku"]. " name: " . $row["name"]. "<br>";
      }

  }
  else
  {
      echo "0 results<br>";
  }

  //if it makes it this far, that means it's that the sku is unique
  $sql = "INSERT INTO `items`(`sku`, `name`, `description`, `date added`) VALUES ('$new_sku','$new_name','$new_description','$new_date')";
  //$sql = "INSERT INTO `items`(`sku`,`item id`) VALUES ('ooh',9)";
  $result = $mysqliLink->query($sql);
  echo "New item added<br>";

  $mysqliLink -> close();
}

function add_new_category($new_name,$new_initials)
{
  $mysqliLink = connect_to_database();
  $sql = "SELECT * FROM categories";
  $result = $mysqliLink->query($sql);
  $new_date = get_now_date();

  if ($result->num_rows > 0)
  {
      // check if new sku is unique
      while($row = $result->fetch_assoc())
      {
        if($row["category initials"] == $new_initials)
        {
          echo '<script language="javascript">';
          echo 'alert("The entered category initials (';
          echo $new_initials;
          echo  ') exist as ';
          echo $row["category name"];
          echo '. Please enter unique initials.");';
          echo '</script>';
          exit();
        }
          echo "id: " . $row["category number"]. " - initials: " . $row["category initials"]. " name: " . $row["category name"]. "<br>";
      }
  }
  else
  {
      echo "0 results<br>";
  }

  //if it makes it this far, that means it's that the sku is unique
  $sql = "INSERT INTO `categories`( `date added`, `category initials`, `category name`) VALUES ('$new_date','$new_initials','$new_name')";
  //$sql = "INSERT INTO `items`(`sku`,`item id`) VALUES ('ooh',9)";
  $result = $mysqliLink->query($sql);
  echo "New category added<br>";

  $mysqliLink -> close();
}

function make_category_options()
{
  $mysqliLink = connect_to_database();
  $sql = "SELECT `category initials`, `category name` FROM `categories` WHERE 1";
  $result = $mysqliLink->query($sql);
  if ($result->num_rows > 0)
  {
      // check if new sku is unique
      while($row = $result->fetch_assoc())
      {
        echo "<option value = '";
        echo $row["category initials"];
        echo "'>";
        echo $row["category initials"];
        echo " - ";
        echo $row["category name"];
        echo "</option>";
      }

  }
  else
  {
      echo "0 results";
  }
  $mysqliLink -> close();
}


?>
