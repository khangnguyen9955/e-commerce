<?php
session_start();
include("_navbar2.php");
if (isset($_POST['remove'])){
    if ($_GET['action'] == 'remove'){
        foreach ($_SESSION['cart'] as $key => $value){
            if($value["productID"] == $_GET['productID']){
                unset($_SESSION['cart'][$key]);
                echo "<script>alert('Product has been removed!')</script>";
                echo "<script>window.location = 'cart.php'</script>";
            }
        }
    }
}

function cartElement($productimg, $productname, $productprice, $productid){
    $element = "
    <form action=\"cart.php?action=remove&productID=$productid\" method=\"post\" class=\"cart-items\">
                        <tr>
                            <td class='align-middle' style='left: 0;'><img src='asset/$productimg' alt='' style='width: 50px'>$productname</td>
                            <td class='align-middle'>$productprice</td>
                            <td class='align-middle'>
                                <div class='input-group quantity mx-auto' style='width: 100px;'>
                                    <div class='input-group-btn'>
                                        <button class='btn btn-sm btn-primary btn-minus' >
                                        <i class='fa fa-minus'></i>
                                        </button>
                                    </div>
                                    <input type='text' class='form-control form-control-sm bg-secondary text-center' value='1'>
                                    <div class='input-group-btn'>
                                        <button class='btn btn-sm btn-primary btn-plus'>
                                            <i class='fa fa-plus'></i>
                                        </button>
                                    </div>
                                </div>
                            </td>
                            <td class='align-middle'>$productprice</td>
                            <td class='align-middle text-center'><button type=\"submit\" name=\"remove\"  class='btn btn-sm btn-primary'><i class='fa fa-times'></i></button>
                            </td>
                        </tr>
                </form>
                
                
                
                
    
    ";
    echo  $element;
}
?>




<!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Shopping Cart</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="">Home</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Shopping Cart</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Cart Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5">
            <div class="col-lg-8 table-responsive mb-5">
                <table class="table table-bordered mb-0">
                    <thead class="bg-secondary text-dark">
                        <tr>
                            <th>Products</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>Remove</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">
                    <?php
                    if(isset($_SESSION['cart'])){
                        $productID = array_column($_SESSION['cart'],'productID');
                        $result = $product->getData();
                        echo $result['productID'];
                        foreach ($productID as $id) {
                        foreach ($result as $row){
                            if($row['productID'] == $id){
                                cartElement($row['image'],$row['name'],$row['price'],$row['productID']);
                                $replace = str_replace(".","",$row['price']);
                                $total = $total +intval($replace);

                            }
                        }
                            }
                    }

?>
                    </tbody>
                </table>
            </div>
            <div class="col-lg-4">
                <form class="mb-5" action="">
                    <div class="input-group">
                        <input type="text" class="form-control p-4" placeholder="Coupon Code">
                        <div class="input-group-append">
                            <button class="btn btn-primary">Apply Coupon</button>
                        </div>
                    </div>
                </form>
                <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0">Cart Summary</h4>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3 pt-1">

                            <?php
                            if (isset($_SESSION['cart'])){
                                $count  = count($_SESSION['cart']);
                                echo "<h6 class='font-weight-medium'>Subtotal ($count items)</h6>";

                            }else{
                                echo "<h6 class='font-weight-medium'>Price (0 items)</h6>";
                            }
                            ?>
                            <h6 class="font-weight-medium"><?php echo number_format($total); ?></h6>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">Shipping</h6>
                            <h6 class="font-weight-medium">FREE</h6>
                        </div>
                    </div>
                    <div class="card-footer border-secondary bg-transparent">
                        <div class="d-flex justify-content-between mt-2">
                            <h5 class="font-weight-bold">Total</h5>
                            <h5 class="font-weight-bold"><?php echo number_format($total); ?></h5>
                        </div>
                        <button class="btn btn-block btn-primary my-3 py-3">Proceed To Checkout</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Cart End -->
