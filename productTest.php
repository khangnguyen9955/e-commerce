<?php
require("./functions.php");

?>
<?php
 $productTest = $product->getData();
    $operations = new Operations();
 if(isset($_GET['deleteID']) && !empty($_GET['deleteID'])) {
    $deleteId = $_GET['deleteID'];
    $operations->deleteProduct($deleteId);
}


?>

<!doctype html>
    <head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>

        <title> Product List </title>
    </head>
    <body>
    <div class="container" style="position: absolute;left: 0;top:0; padding-top:20px">
            <button class="btn btn-primary " style="width: 100px" onclick="<?php header("location: index.php"); ?>">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-return-left" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M14.5 1.5a.5.5 0 0 1 .5.5v4.8a2.5 2.5 0 0 1-2.5 2.5H2.707l3.347 3.346a.5.5 0 0 1-.708.708l-4.2-4.2a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 8.3H12.5A1.5 1.5 0 0 0 14 6.8V2a.5.5 0 0 1 .5-.5z"/>
                </svg>
            </button>
        </div>
            <div class="container">

    <?php
    
    if (isset($_GET['msg1']) == "insert") {
      echo "<div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert'>&times;</button>
              Your Product added successfully
            </div>";
      } 
    if (isset($_GET['msg2']) == "update") {
      echo "<div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert'>&times;</button>
              Your Product updated successfully
            </div>";
    }
    if (isset($_GET['msg3']) == "delete") {
      echo "<div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert'>&times;</button>
              Product deleted successfully
            </div>";
    }
  ?>
        <table class="table table-bordered">
                <h2 > Product List </h2>
            <p><h2><a href="./add.php">Add new product</a></h2></p>
            <thead>
                <tr>
                    <th>ProductID</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Details</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($productTest as $row){
                    ?>
                <tr>
                    <td><?php echo $row['productID'];  ?></td>
                    <td><?php echo $row['name'];  ?></td>
                    <td><?php echo $row['price'];  ?></td>
                    <td><?php echo $row['details'];  ?></td>
                    <td>
                        <a href="edit.php?id=<?= $row['productID']?>">
                        <i class="fa fa-pencil" aria-hidden="true"></i></a>&nbsp
                        </a>
                        <a href="admin/index.php?deleteID=<?= $row['productID']?>"
                            onclick="return confirm('Are you sure delete this product?');">
                            <i class="fa fa-trash" aria-hidden="true"></i>
                        </a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
        </div>
    </body>




</html>