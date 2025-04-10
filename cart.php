<?php require_once('inc/header.php'); 

// $cart=get_cart();
?>

<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row">
            <div class="col-12">
                <?php if (empty(get_cart())): ?>
    <div class="alert alert-warning" role="alert">
    Your Cart Is Empty Return To <a href="index.php" class="alert-link">Home</a> 
</div>


<?php else: ?>
    <!-- <table class="table table-dark table-hover"> -->
    <table class="table table-hover"">
    <!-- <table class="table table-bordered"> -->
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Product</th>
                <th scope="col">Price</th>
                <th scope="col">Quantity</th>
                <th scope="col">Total</th>
                <th scope="col">Delete</th>
            </tr>
            </thead>
        <tbody>

        <?php
                $total = 0;
                $index = 1;
            foreach (get_cart() as $item):
                $item_total = $item['price'] * $item['quantity'];
                $total += $item_total;
            ?>
                <tr>
                    <th scope="row">
                        <?= $index++; ?>
                    </th>
                    <td>
                        <?= $item['name']; ?>
                    </td>
                    <td>$
                        <?php
                        //to take the two decmials 
                         echo number_format($item['price'], 2);
                          ?>
                </td>
                    <td>
                        <form  action="handler/cart/update.php" method="POST" class="d-inline">
                            <input type="hidden" name="id" value="<?= $item['id']; ?>">
                            <input type="number" name="quantity" value="<?= $item['quantity']; ?>" min="1" style="width: 60px ;">
                            <input type="hidden" name="update_quantity" value="1">
                            <button type="submit" class="badge rounded-pill text-bg-success">Update</button>
            </form>
                    
                    </td>
                    <td>$<?php echo number_format($item_total, 2); ?></td>
                    <td>
                        <form  action="handler/cart/delete.php" method='POST' class="d-inline">
                            <input type="hidden" name="id" value="<?= $item['id']; ?>">
                                            <button type="submit" class="btn btn-outline-danger">Delete</button>
                                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
                            <tr>
                <td colspan="2">Total Price</td>
                <td colspan="3">
                                    <h3>$
                        <?php echo number_format($total, 2); ?></h3>
                                </td>
                                <td>
                                    <a href="checkout.php" class="btn btn-outline-primary">Checkout</a>
                </td>
            </tr>
                        </tbody>
                    </table>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>


<?php require_once('inc/footer.php'); ?>