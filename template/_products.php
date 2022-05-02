 <?php 
    $product_shuffle = $product->getData();

 ?> 

   <!-- Products Start -->
    <div class="container-fluid pt-5">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">Trendy Products</span></h2>
        </div>
        <div class="row px-xl-5 pb-3">
           <?php foreach(array_slice($product_shuffle,0,12) as $item) { ?>
            <form action="index.php" method="post" class="col-lg-3 col-md-6 col-sm-12 pb-1">

                <div class="card product-item border-0 mb-4">
                    <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                        <img class="img-fluid w-100" src="./asset/<?php echo $item['image'] ?>" alt="">
                    </div>
                    <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                        <h6 class="text-truncate mb-3"><?php echo $item['name'] ?></h6>
                        <div class="d-flex justify-content-center">
                            <h6><?php echo $item['price']?></h6><h6 class="text-muted ml-2"><del><?php echo $item['price'] ?></del></h6>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-between bg-light border">
                        <a href="<?php printf('%s?product_id=%s','product.php', $item['productID']);?>" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View Detail</a>
                        <button name="order" type="submit"  class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</button>
                        <input type="hidden" name="productID" value="<?php echo $item['productID'] ?>" >
                    </div>
            </div>
            </form>

           <?php } ?>
        </div>
    </div>
    <!-- Products End -->
