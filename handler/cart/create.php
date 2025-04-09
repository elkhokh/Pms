<?php
session_start();
include_once "../../core/validations.php";
include_once "../../core/functions.php";


if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['product_id'])) {
    $product_id = $_POST['product_id'];
    // $product_name = $_POST['product_name'];
    // $price = $_POST['price'];
    // $quantity = $_POST['quantity'];

    if (add_to_cart($product_id)) {
        set_messages('success', "Product added to cart successfully!");
    } else {
        set_messages('danger', "Failed to add product to cart!");
    }
    header("Location: ../../index.php");
    exit;
}