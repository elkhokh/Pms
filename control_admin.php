<?php require_once('inc/header.php'); ?>

<!-- Section -->
<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row">
            <div class="col-12">
                <!-- Page Header -->
                <div class="text-center mb-5">
                    <h2 class="fw-bold text-primary"><i class="bi bi-gear-fill me-2"></i>Admin Control Panel</h2>
                    <p class="text-muted">Manage products and orders with ease</p>
                </div>

                <!-- Buttons -->
                <div class="d-flex justify-content-center gap-3 flex-wrap">
                    <a href="add_product.php" class="btn btn-success btn-lg px-4 py-3 shadow-sm">
                        <i class="bi bi-plus-circle-fill me-2"></i>Add Product to Main Page
                    </a>
                    <a href="show_product.php" class="btn btn-danger btn-lg px-4 py-3 shadow-sm">
                        <i class="bi bi-trash-fill me-2"></i>Delete Product from Main Page
                    </a>
                    <a href="show_order.php" class="btn btn-warning btn-lg px-4 py-3 shadow-sm">
                        <i class="bi bi-list-check me-2"></i>Show Orders
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require_once('inc/footer.php'); ?>