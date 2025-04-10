<?php session_start();?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>
            Shop Homepage - EraaSoft PMS Template

        </title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/pic/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="assets/css/styles.css" rel="stylesheet" />
        
    </head>
    
    <body>

        <!-- Navigation-->

<?php require_once('nav.php'); ?>
<header class="bg-dark py-3">
    <div class="container px-3 px-lg-3 my-3">
        <div class="text-center text-white">
        <?php
// session_start();
include_once "core/functions.php";

?>
<div class="container">
<?php show_message(); ?>
</div>
            <h1 class="display-3 fw-bolder">Shop in style</h1>
        </div>
        
    </div>
</header> 


