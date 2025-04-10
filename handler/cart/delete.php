<?php
session_start();
include_once "../../core/functions.php";

if($_SERVER["REQUEST_METHOD"] !== "POST" || !isset($_POST['id']) || empty($_POST['id']))
    {
    set_messages('danger', "Error in data send try again");
            header("Location: ../../cart.php");
        exit;
    }

    $product_id = $_POST['id'];
    if (delete_from_cart($product_id))
     {
        set_messages('success', "Product removed from cart");
    } 
    else {
        set_messages('danger', "Failed to remove product from cart");
    }
    header("Location: ../../cart.php");
    exit;
    

