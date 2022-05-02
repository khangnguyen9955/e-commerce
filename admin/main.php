
<div class="container-scroller">
    <?php include("./_navbar.php");?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <?php include ("./_sidebar.php");?>



<div class="main-panel">

            <div class="content-wrapper">

                    <div class="card">

                        <div class="card-body">
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
                            <div class="table-responsive pt-3">
                                <table class="table table-bordered table-hover">
                                    <h2 class="text-center"> Product List </h2>
                                    <p><h2><a href="../add.php">Add new product</a></h2></p>
                                    <thead>
                                    <tr>
                                        <th scope="col">ProductID</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Details</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                    </thead>

                                    <tbody>

                                    <?php foreach ($product->getData() as $row){ ?>
                                    <tr class="table-success">
                                        <td style="width:50px;"><?php echo $row['productID'];  ?></td>
                                        <td  style="width:50px;"><?php echo $row['name'];  ?></td>
                                        <td  style="width:50px;"><?php echo $row['price'];  ?></td>
                                        <td  style="white-space:normal"><?php echo $row['details'];  ?></td>
                                        <td>
                                            <a href="../edit.php?id=<?= $row['productID']?>">
                                                <i class="fa fa-pencil" aria-hidden="true"></i></a>&nbsp
                                            </a>
                                            <a href="../productTest.php?deleteID=<?= $row['productID']?>"
                                               onclick="return confirm('Are you sure delete this product?');">
                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php } ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                </div>


            </div>
            <!-- content-wrapper ends -->
            <!-- partial:partials/_footer.html -->

            <?php include("./footer.php");?>
            <!-- partial -->
        </div>
        <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->