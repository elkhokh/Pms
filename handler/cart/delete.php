<?php
session_start();
include_once "../../core/functions.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['product_id'])) {
    $product_id = $_POST['product_id'];
    if (remove_from_cart($product_id)) {
        set_messages('success', "Product removed from cart!");
    } else {
        set_messages('danger', "Failed to remove product from cart!");
    }
    header("Location: ../../cart.php");
    exit;
}