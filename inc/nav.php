<?php  
//  session_start();
 ?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="#!">EraaSoft PMS</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="index.php">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="about.php">About</a></li>
                        <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
                    </ul>
                    <form class="d-flex" action="cart.php" method ="POST">
                        <button class="btn btn-outline-dark" type="submit">
                            <i class="bi-cart-fill me-1"></i>
                            Cart
                            <span class="badge bg-dark text-white ms-1 rounded-pill">0</span>
                        </button>
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                    
                    <?php  if(isset($_SESSION['user'])): ?>
                <li class="nav-item"><a class="nav-link" href="handler/user/logout.php">Logout</a></li>
                <?php else: ?>

                    <!-- <li class="nav-item"><a class="nav-link" href="register.php">Register</a></li>
                    <li class="nav-item"><a class="nav-link" href="login.php">Login</a></li> -->
                    <div class="dropdown ">
  <button class="btn btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
  Login
  </button>
  <ul class="dropdown-menu dropdown-menu">
  <li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>
    <li><hr class="dropdown-divider"></li>
    <li class="nav-item"><a class="nav-link" href="register.php">Register</a></li>
  </ul>
</div>
            
                <?php endif; ?>
                </ul>
                    </form>
                </div>
            </div>
        </nav>
      