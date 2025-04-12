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
} else {
    $total_price = 0;
    $total_original_price = 0;
}
?>

<!-- Section -->
<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row">
            <div class="col-12">
                <!-- Page Header -->
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h4 class="mt-5 fw-bold text-primary"><i class="bi bi-box-seam me-2"></i>Product List</h4>
                    <a href="control_admin.php" class="btn btn-outline-primary btn-sm"><i class="bi bi-arrow-left me-2"></i>Back to Dashboard</a>
                </div>

                <!-- Products Table -->
                <div class="table-responsive mb-5">
                    <table class="table table-bordered table-striped table-hover shadow-sm">
                        <thead class="table-dark">
                            <tr>
                                <th>ID</th>
                                <th>Name of Product</th>
                                <th>Price (After Discount)</th>
                                <th>Original Price</th>
                                <th>Rating</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach (get_products() as $items): ?>
                                <tr>
                                    <td class="fw-bold text-muted"><?= htmlspecialchars($items['id']); ?></td>
                                    <td><?= htmlspecialchars($items['name']); ?></td>
                                    <td class="text-success fw-bold">$<?= number_format($items['price'], 2); ?></td>
                                    <td class="text-muted text-decoration-line-through">$<?= number_format($items['original_price'], 2); ?></td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <i class="bi bi-star-fill text-warning me-1"></i>
                                            <span><?= htmlspecialchars($items['rating']); ?></span>
                                        </div>
                                    </td>
                                    <td>
                                        <a href="edit_product.php?id=<?= htmlspecialchars($items['id']); ?>" class="btn btn-outline-warning btn-sm">
                                            <i class="bi bi-pencil-square me-1"></i>Edit
                                        </a>
                                    </td>
                                    <td>
                                        <form action="handler/product/delete.php" method="POST" onsubmit="return confirm('Are you sure you want to delete this product?');">
                                            <input type="hidden" name="id" value="<?= htmlspecialchars($items['id']); ?>">
                                            <button class="btn btn-outline-danger btn-sm">
                                                <i class="bi bi-trash-fill me-1"></i>Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

                <!-- Totals Table -->
                <?php if (!empty($products)): ?>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped shadow-sm">
                            <thead class="table-primary">
                                <tr>
                                    <th scope="col">Description</th>
                                    <th scope="col">Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Total Price (After Discount)</td>
                                    <td class="fw-bold text-success">$<?= number_format($total_price, 2); ?></td>
                                </tr>
                                <tr>
                                    <td>Total Original Price (Before Discount)</td>
                                    <td class="fw-bold text-muted text-decoration-line-through">$<?= number_format($total_original_price, 2); ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                <?php else: ?>
                    <!-- No Products Message -->
                    <div class="alert alert-warning d-flex align-items-center" role="alert">
                        <i class="bi bi-exclamation-triangle-fill me-2 fs-4"></i>
                        <div>No products available to calculate totals.</div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<?php require_once('inc/footer.php'); ?>