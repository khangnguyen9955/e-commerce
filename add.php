<?php
    require("./functions.php");
?>

<?php 
    $operations = new Operations();
 
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Product add</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div  style="position: absolute;left: 0;top:0; padding-top:20px">
    <a href="/project/admin/index.php">
    <button class="btn btn-primary " style="width: 100px" >

        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-return-left" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M14.5 1.5a.5.5 0 0 1 .5.5v4.8a2.5 2.5 0 0 1-2.5 2.5H2.707l3.347 3.346a.5.5 0 0 1-.708.708l-4.2-4.2a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 8.3H12.5A1.5 1.5 0 0 0 14 6.8V2a.5.5 0 0 1 .5-.5z"/>
        </svg>

    </button>
    </a>
</div>



<div class="container mt-3">

  <h2>Add new product</h2>
  <?php $operations->addProduct(); ?>
  <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
    <div class="mb-3 mt-3">
      <label for="ProductID">ProductID:</label>
      <input type="text" class="form-control" id="productID" placeholder="Enter product ID" name="productID" require="required">
    </div>
    <div class="mb-3">
      <label for="Name">Name:</label>
      <input type="text" class="form-control" id="name" placeholder="Enter product name" name="name" require="required">
    </div>
    <div class="mb-3">
      <label for="Price">Price:</label>
      <input type="text" class="form-control" id="price" placeholder="Enter product price" name="price" require="required">
    </div>
    <div class="mb-3">
      <label for="Image">Image:</label>
      <input type="file" class="form-control" id="image" placeholder="Enter product image" name="image"require="required">
    </div>
    <div class="mb-3">
      <label for="Details">Details:</label>
      <textarea class="form-control" name="details" id="details"require="required">
      </textarea>
    </div>
    <div class="mb-3">
      <select class="form-control" name="categoryID" id="categoryID">
      <option value=""disabled selected>Select product category</option>
      <?php foreach($product->getCategory() as $row){?>
      <option value="<?=$row['categoryID']?>">
            <?php echo $row['categoryID'].' - '. $row['name']?>
      </option> 
      <?php } ?>
      </select>
    </div>
    <button type="submit" class="btn btn-primary" id="addnew" name="addnew" >Add New</button>
  </form>
</div>

</body>
</html>