<?php include_once "core/functions.php"; ?>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
    <div class="container px-4 px-lg-5">
        <!-- Brand -->
        <a class="navbar-brand fw-bold text-white" href="index.php">
            <i class="bi bi-cart4 me-2"></i>Electronics Store
        </a>
        <!-- Toggler for Mobile -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Navbar Content -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Links -->
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about.php">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact.php">Contact</a>
                </li>
            </ul>
            <!-- Right Side Actions -->
            <div class="d-flex align-items-center gap-3">
                <!-- Cart Button -->
                <form action="cart.php" method="POST" class="d-inline">
                    <button class="btn btn-outline-light" type="submit">
                        <i class="bi bi-cart-fill me-1"></i> Cart
                        <span class="badge bg-light text-dark ms-1 rounded-pill">
                            <?php
                            if (!empty(get_cart())) {
                                $count = 0;
                                foreach (get_cart() as $item) {
                                    $count += $item['quantity'];
                                }
                                echo $count;
                            } else {
                                echo 0;
                            }
                            ?>
                        </span>
                    </button>
                </form>
                <!-- User Actions -->
                <?php if (isset($_SESSION['user'])): ?>
                    <a class="btn btn-outline-light" href="handler/user/logout.php">
                        <i class="bi bi-box-arrow-right me-1"></i> Logout
                    </a>
                <?php else: ?>
                    <!-- Dropdown for Login/Register/Admin -->
                    <div class="dropdown">
                        <button class="btn btn-outline-light dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-person-circle me-1"></i> Account
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end shadow-sm">
                            <li>
                                <a class="dropdown-item" href="login.php">
                                    <i class="bi bi-person-check me-2"></i> Login
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="register.php">
                                    <i class="bi bi-person-bounding-box me-2"></i> Register
                                </a>
                            </li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <a class="dropdown-item" href="login_admin.php">
                                    <i class="bi bi-person-fill-gear me-2"></i> Admin
                                </a>
                            </li>
                        </ul>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</nav>