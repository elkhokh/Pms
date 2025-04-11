<?php

include "inc/header.php";
// session_start();

?>
<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row">
            <div class="col-8 mx-auto">

                <?php
                if (!isset($_GET['id'])) {

                    set_messages('danger', "No Product Selected");
                    header("Location: edit_product.php");
                    exit;
                }

                $id = $_GET['id'];
                $products = get_products();

                $items = null;
                foreach ($products as $product) {
                    if ($product['id'] == $id) {
                        $items = $product;
                        break;
                    }
                }
                ?>

                <form method="post" action="handler/product/update.php">
                <input type="hidden" id="id" name="id" class="form-control" value="<?= $items['id'] ?>">
                    <div class="mb-3">
                        <label for="name" class="form-label">Product Name</label>
                        <input type="text" id="name" name="name" class="form-control"value="<?= $items['name'] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Price after discount</label>
                        <input type="number" id="price" name="price" class="form-control" value="<?= $items['price'] ?>">
                    </div>

                    <div class="mb-3">
                        <label for="original_price" class="form-label">Price before discount</label>
                        <input type="number" id="original_price" name="original_price" class="form-control" value="<?= $items['original_price'] ?>">
                    </div>


                    <div class="mb-3">
                        <label for="type" class="form-label">Rating</label>
                        <select name="rating" id="rating" class="form-select">
                            <option value="1" <?= $items['rating'] == 1 ? 'selected' : '' ?>>One</option>
                            <option value="2" <?= $items['rating'] == 2 ? 'selected' : '' ?>>Two</option>
                            <option value="3" <?= $items['rating'] == 3 ? 'selected' : '' ?>>Three</option>
                            <option value="4" <?= $items['rating'] == 4 ? 'selected' : '' ?>>four</option>
                            <option value="5" <?= $items['rating'] == 5 ? 'selected' : '' ?>>five</option>
                            <!-- <option value="20">twenty</option> -->
                        </select>
                    </div>
                    <div class="mb-3">
    <label for="image" class="form-label">Choose Image</label>
    <input type="file" class="form-control" id="image" name="image" accept="image/*" aria-label="image" value="<?= $items['image'] ?>" >
</div>
                    <div class="mb-3">
                        <button class="btn btn-success" type="submit">Submit Add</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</section>

<?php include "inc/footer.php"; ?>