<?php include_once "core/functions.php";?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="#!">
                    <!-- EraaSoft PMS -->
                    Electronics Store <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart4" viewBox="0 0 16 16">
  <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5M3.14 5l.5 2H5V5zM6 5v2h2V5zm3 0v2h2V5zm3 0v2h1.36l.5-2zm1.11 3H12v2h.61zM11 8H9v2h2zM8 8H6v2h2zM5 8H3.89l.5 2H5zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2m-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0m9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2m-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0"/>
</svg>
                </a>
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
                            <span class="badge bg-dark text-white ms-1 rounded-pill">
                                <?php  
//  session_start();
            if (!empty(get_cart())){
                $count = 0;
            foreach (get_cart() as $item){
                $count += $item['quantity']; 
            } echo $count;
                    } else echo 0;

 ?>   </span>
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
    <li><hr class="dropdown-divider"></li>
    <li class="nav-item"><a class="nav-link" href="login_admin.php">Admin</a></li>
  </ul>
</div>
            
                <?php endif; ?>
                </ul>
                    </form>
                </div>
            </div>
        </nav>

    