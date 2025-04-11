<?php require_once('inc/header.php'); ?>

<!-- Section -->
<section class="py-1">
    <div class="container px-2 px-lg-2 mt-2">
        <div class="row">
            <div class="col-15">
    <h4 class="mt-5">Porduct List</h4>
    <!-- <table class="table table-success table-striped-columns"> -->
    <table class=" table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                 <th>ID</th>
                <th>Name of product</th>
                <th>Price after discount</th>
                <th>original price</th>
                <th>Rating </th>
                <th>Edit </th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php
               foreach (get_products() as $items) {
                echo "<tr>
                <td>{$items['id']}</td>
                <td>{$items['name']}</td>
                <td>{$items['price']}</td>
                <td>{$items['original_price']}</td>
                <td>{$items['rating']}</td>
                <td><a href='edit_product.php?id={$items['id']}' class='btn btn-outline-warning'>Edit</a></td>
                <td>
                <form action='handler/product/delete.php' method='POST'>
                <input type='hidden' name='id' value='{$items['id']}'>
                <button class='btn btn-outline-danger'>Delete</button>
                </form>
                </td>
                </tr>
                ";
            }
            ?>
           <?php 
require_once('inc/header.php');

$products = get_products();
$total_price = 0;
$total_original_price = 0;

if (!empty($products)) {
    foreach ($products as $item) {
        $total_price += (float)($item['price'] ?? 0);
        $total_original_price += (float)($item['original_price'] ?? 0);
    }
    $total_savings = $total_original_price - $total_price;
} else {
    $total_price = 0;
    $total_original_price = 0;
    $total_savings = 0;
}
?>

                <?php if (!empty($products)): ?>
                    <table class="table table-bordered table-striped">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">Description</th>
                                <th scope="col">Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Total Price (after discount)</td>
                                <td>$<?php echo number_format($total_price, 2); ?></td>
                            </tr>
                            <tr>
                                <td>Total Original Price (before discount)</td>
                                <td>$<?php echo number_format($total_original_price, 2); ?></td>
                            </tr>
                            <tr>
                                <td>Total Savings</td>
                                <td>$<?php echo number_format($total_savings, 2); ?></td>
                            </tr>
                        </tbody>
                    </table>
                <?php else: ?>
                    <div class="alert alert-warning" role="alert">
                        No products available to calculate totals.
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>



<?php require_once('inc/footer.php'); ?>
