<?php require_once('inc/header.php'); ?>

<!-- Section -->
<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row">
            <div class="col-lg-6 col-md-8 mx-auto">
                <!-- Card for Add Product Form -->
                <div class="card shadow-sm border-0 rounded">
                    <div class="card-body p-5">
                        <!-- Header -->
                        <div class="text-center mb-4">
                            <h3 class="fw-bold text-primary"><i class="bi bi-box-seam me-2"></i>Add New Product</h3>
                            <p class="text-muted">Fill in the details to add a new product to the store</p>
                        </div>

                        <!-- Add Product Form -->
                        <form method="POST" action="handler/product/create.php" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="name" class="form-label">Product Name</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-tag-fill"></i></span>
                                    <input type="text" id="name" name="name" class="form-control" placeholder="Enter product name" >
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="price" class="form-label">Price (After Discount)</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-currency-dollar"></i></span>
                                    <input type="number" id="price" name="price" class="form-control" placeholder="Enter price after discount" step="0.01" min="0" >
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="original_price" class="form-label">Price (Before Discount)</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-currency-dollar"></i></span>
                                    <input type="number" id="original_price" name="original_price" class="form-control" placeholder="Enter original price" step="0.01" min="0" >
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="rating" class="form-label">Rating</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-star-fill"></i></span>
                                    <select name="rating" id="rating" class="form-select" >
                                        <option value="" disabled selected>Select rating</option>
                                        <option value="1">1 - Poor</option>
                                        <option value="2">2 - Fair</option>
                                        <option value="3">3 - Good</option>
                                        <option value="4">4 - Very Good</option>
                                        <option value="5">5 - Excellent</option>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-4">
                                <label for="image" class="form-label">Product Image</label>
                                <input type="file" class="form-control" id="image" name="image" accept="image/*" >
                            </div>
                            <div class="text-end">
                                <button class="btn btn-success btn-lg px-4" type="submit">
                                    <i class="bi bi-plus-circle-fill me-2"></i>Add Product
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require_once('inc/footer.php'); ?>