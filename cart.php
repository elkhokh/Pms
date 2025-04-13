<?php require_once('inc/header.php'); ?>

<!-- Section -->
<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row">
            <div class="col-12">
                <!-- Page Header -->
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h4 class="fw-bold text-primary"><i class="bi bi-cart-fill me-2"></i>Shopping Cart</h4>
                    <a href="index.php" class="btn btn-outline-secondary btn-sm"><i
                            class="bi bi-arrow-left me-2"></i>Continue Shopping</a>
                </div>

                <?php if (empty(get_cart())): ?>
                    <!-- Empty Cart Message -->
                    <div class="alert alert-warning d-flex align-items-center" role="alert">
                        <i class="bi bi-exclamation-triangle-fill me-2 fs-4"></i>
                        <div>Your Cart Is Empty. Return To <a href="index.php" class="alert-link">Home</a></div>
                    </div>
                <?php else: ?>
                    <!-- Cart Table -->
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover shadow-sm">
                            <thead class="table-dark">
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
                                        <th scope="row" class="text-muted"><?= $index++; ?></th>
                                        <td class="fw-bold"><?= htmlspecialchars($item['name']); ?></td>
                                        <td class="text-success">$<?= number_format($item['price'], 2); ?></td>
                                        <td>
                                            <form action="handler/cart/update.php" method="POST"
                                                class="d-flex align-items-center gap-2">
                                                <input type="hidden" name="id" value="<?= htmlspecialchars($item['id']); ?>">
                                                <input type="number" name="quantity"
                                                    value="<?= htmlspecialchars($item['quantity']); ?>" min="1" max="100"
                                                    class="form-control form-control-sm" style="width: 80px;" required>
                                                <input type="hidden" name="update_quantity" value="1">
                                                <button type="submit" class="btn btn-sm btn-success">
                                                    <i class="bi bi-arrow-repeat me-1"></i>Update
                                                </button>
                                            </form>
                                        </td>
                                        <td class="text-success fw-bold">$<?= number_format($item_total, 2); ?></td>
                                        <td>
                                            <form action="handler/cart/delete.php" method="POST" class="d-inline"
                                                onsubmit="return confirm('Are you sure you want to delete this item?');">
                                                <input type="hidden" name="id" value="<?= htmlspecialchars($item['id']); ?>">
                                                <button type="submit" class="btn btn-sm btn-outline-danger">
                                                    <i class="bi bi-trash-fill me-1"></i>Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                                <!-- Total Row -->
                                <tr>
                                    <td colspan="2" class="fw-bold">Total Price</td>
                                    <td colspan="3">
                                        <h3 class="text-success mb-0">$<?= number_format($total, 2); ?></h3>
                                    </td>
                                    <td>
                                        <a href="checkout.php" class="btn btn-primary btn-sm">
                                            <i class="bi bi-credit-card-2-front-fill me-1"></i>Proceed to Checkout
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<?php require_once('inc/footer.php'); ?>