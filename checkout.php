<?php require_once('inc/header.php'); ?>

<!-- Section -->
<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row">
            <!-- Cart Summary -->
            <div class="col-lg-4 col-md-5 mb-4">
                <div class="border p-4 rounded shadow-sm bg-light">
                    <h4 class="mb-4 fw-bold text-primary"><i class="bi bi-cart-check-fill me-2"></i>Cart Summary</h4>
                    <div class="products">
                        <ul class="list-unstyled">
                            <?php
                            if (!empty(get_cart())) {
                                $total = 0;
                                foreach (get_cart() as $item) {
                                    $item_total = $item['price'] * $item['quantity'];
                                    $total += $item_total;
                                    ?>
                                    <li class="border-bottom py-3">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span class="fw-bold"><?= htmlspecialchars($item['name']); ?></span>
                                            <span class="text-success fw-bold">
                                                <?= htmlspecialchars($item['quantity']); ?> x $<?= number_format($item['price'], 2); ?> = $<?= number_format($item_total, 2); ?>
                                            </span>
                                        </div>
                                    </li>
                                    <?php
                                }
                            } else {
                                echo '<li class="text-muted text-center py-3">Your cart is empty.</li>';
                            }
                            ?>
                        </ul>
                    </div>
                    <h3 class="mt-4 text-end">Total: <span class="text-success fw-bold">$<?= isset($total) ? number_format($total, 2) : '0.00'; ?></span></h3>
                </div>
            </div>

            <!-- Checkout Form -->
            <div class="col-lg-8 col-md-7">
                <div class="border p-4 rounded shadow-sm">
                    <h4 class="mb-4 fw-bold text-primary"><i class="bi bi-credit-card-2-front-fill me-2"></i>Checkout</h4>
                    <form action="handler/checkout/create.php" method="POST" class="form">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Enter your full name" required>
                        </div>
                        <div class="mb-3">
                            <label for="email_ch" class="form-label">Email</label>
                            <input type="email" name="email_ch" id="email_ch" class="form-control" placeholder="Enter your email" required>
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">Address</label>
                            <input type="text" name="address" id="address" class="form-control" placeholder="Enter your address" required>
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="tel" name="phone" id="phone" class="form-control" placeholder="Enter your phone number" required>
                        </div>
                        <div class="mb-3">
                            <label for="notes" class="form-label">Notes (Optional)</label>
                            <textarea name="notes" id="notes" class="form-control" rows="3" placeholder="Any additional notes?"></textarea>
                        </div>
                        <div class="text-end">
                            <button type="submit" class="btn btn-success btn-lg px-4">
                                <i class="bi bi-check-circle-fill me-2"></i>Confirm Order
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require_once('inc/footer.php'); ?>