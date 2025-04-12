<?php 

session_start();
session_unset();
session_destroy();
  header('location: ../../login.php');
exit;


/*************************************** */
// session_start();


// $admin = false;
// if (isset($_SESSION['admin']) && $_SESSION['admin'] === 'admin') {
//     $admin = true;
// }

// session_unset();
// session_destroy();

// if ($admin) {
//     header('location: ../../login_admin.php');
// } else {
//     header('location: ../../login.php');
// }
// exit;