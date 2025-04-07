<?php 

session_start();
session_unset();
session_destroy();
  print_r(header('location: ../../user/login.php'));
exit;