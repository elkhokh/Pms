<?php
session_start();
include_once "../../core/functions.php";

if($_SERVER["REQUEST_METHOD"] !== "POST" || !isset($_POST['id']) || empty($_POST['id']))
    {
    set_messages('danger', "Error in data send try again");
            // header("Location: ../../show_product.php");
           print_r( header("Location: ../../show_product.php"));
        exit;
    }

    $product_id = $_POST['id'];
    if (delete_porduct($product_id))
     {
        set_messages('success', "Product removed  ");
    } 
    else {
        set_messages('danger', "Failed to remove product ");
        header("Location: ../../show_product.php");
        exit;
    }
   
    
