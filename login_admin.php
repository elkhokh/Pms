<?php
include "inc/header.php";
// session_start();
?>

<!-- Section -->
<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row">
            <div class="col-lg-6 col-md-8 mx-auto">
                <!-- Card for Login Form -->
                <div class="card shadow-sm border-0 rounded">
                    <div class="card-body p-5">
                        <!-- Header -->
                        <div class="text-center mb-4">
                            <h3 class="fw-bold text-primary"><i class="bi bi-shield-lock-fill me-2"></i>Admin Login</h3>
                            <p class="text-muted">Please enter your credentials to access the admin panel</p>
                        </div>

                        <!-- Login Form -->
                        <form action="handler/user/admin.php" method="POST" class="form">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-envelope-fill"></i></span>
                                    <input type="email" name="email" id="email" class="form-control" placeholder="Enter your email" >
                                </div>
                            </div>
                            <div class="mb-4">
                                <label for="password" class="form-label">Password</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
                                    <input type="password" name="password" id="password" class="form-control" placeholder="Enter your password" >
                                </div>
                            </div>
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-success btn-lg">
                                    <i class="bi bi-box-arrow-in-right me-2"></i>Login
                                </button>
                            </div>
                        </form>

                        <!-- Link to User Login -->
                        <div class="text-center mt-4">
                            <p class="text-muted">Not an admin? <a href="login.php" class="text-primary text-decoration-none">Login as User</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include "inc/footer.php"; ?>