<!DOCTYPE html>
<html>
  <head>
  </head>
  <body>
      <!-- Latest compiled and minified CSS -->
      <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
      <!-- jQuery library -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
      <!-- Latest compiled JavaScript -->
      <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
      <!-- java script -->
      <script src="js/app.js"></script>

      <button class="btn btn-info" data-toggle="collapse" data-target="#new_item_div">Add new item</button>
      <div class="collapse" id="new_item_div">
        <div class="container">
          <div id="new_item" class="jumbotron">
            <h2>New Item</h2>
            <h4>Create a new item.</h4>
          </div>
          <div class="row">
            <form action="php/add_new_item.php" method="post">
              <div class="col-sm-4">
              Item category: <br>
              <select onchange='item_selected()' id = "selected_category">
              <!-- php to get categories -->
                <?php
                  include 'php/script.php';
                  make_category_options();
                ?>
              </select>
              </div>
              <div class="col-sm-4">
              SKU: <br>
              <span id="sku_div"></span>
              <input type="text" name="sku" maxlength="3">
              </div>
              <div class="col-sm-4">
              Item name: <br>
              <input type="text" name="item_name">
              </div>
              <div class="col-sm-4">
              Item description: <br>
              <input type="text" name="item_description">
              </div>


              <div class="pull-right">
              <input type="submit" value="Submit">
              </div>
            </form>
          </div>
        </div>
    </div>


  </body>
</html>
