<?php
require_once('inc/header.php');
$products = get_products();
?>

<!------------------------------------------------------------- Section -------------------------------------------------->

<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">

        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
            <?php
            //to check you have product in json file
            if (!empty($products)):
                ?>
                <?php
                // loop in data to get and make operation
                foreach ($products as $product):
                    ?>
                    <div class="col mb-5">
                        <div class="card h-100">

                            <!----------------------------------------- Sale badge -------------------------------------------------------------->
                            <?php
                            // to check first price to compare
                            if ($product['price'] < $product['original_price']): ?>
                                <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Sale
                                </div>
                            <?php endif; ?>


                            <!-------------------------- Product image and get the auto image from file --------------------------------------->
                    <!-- Product image -->
                    <img class="card-img-top" src="
                    <?php echo isset($product['image']) && !empty($product['image']) && file_exists($product['image']) ? $product['image'] : 'https://dummyimage.com/450x300/dee2e6/6c757d.jpg'; ?>
                    " alt="<?php echo isset($product['name']) ? $product['name'] : 'Product Image'; ?>" />

                    <!------------------------------------ Product details ------------------------------------------------->
                    <div class="card-body p-4">
                        <div class="text-center">
                            <!-- Product name -->
                                    <h5 class="fw-bolder"><?= $product['name']; ?></h5>

                                    <!------------------------- Product reviews  take review from json ------------------------------------------------->
                            <?php if ($product['rating'] > 0): ?>
                            <div class="d-flex justify-content-center small text-warning mb-2">
                                <?php
                                // flex rating you chang from product json 
                                for ($i = 0; $i < $product['rating']; $i++):
                                    ?>
                                <div class="bi-star-fill"></div>
                                <?php endfor; ?>
                            </div>
                            <?php endif; ?>

                            <!----------------------------------------------- Product price ------------------------------------------->
                            <?php if ($product['price'] < $product['original_price']): ?>
                            <span class="text-muted text-decoration-line-through">$
                                <?php echo number_format($product['original_price'], 2); ?>
                            </span>
                            <?php endif; ?>
                            $
                            <?php
                            // to make number formate like 2000,000,000
                            // echo number_format("1000000")."<br>";
                            // echo number_format("1000000",2)."<br>";
                            // echo number_format("1000000",2,",",".");                                    
                            echo number_format($product['price'], 2);
                            ?>
                        </div>
                    </div>


                    <!---------------------------------- Product actions ----------------------------------------->
                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                        <form method="POST" action="handler/cart/create.php">
                            <input type="hidden" name="id" value="<?= $product['id']; ?>">
                            <input type="hidden" name="name" value="<?= $product['name']; ?>">
                            <input type="hidden" name="price" value="<?= $product['price']; ?>">
                            <div class="text-center">
                                <button type="submit" class="btn btn-outline-dark mt-auto">Add to cart</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
            <?php else: ?>
            <p>No products available ِAdd Product In Product File Json</p>
            <?php endif; ?>
        </div>
    </div>
</section>


<?php require_once('inc/footer.php'); ?>