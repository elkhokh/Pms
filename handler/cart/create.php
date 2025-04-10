<?php
session_start();
include_once "../../core/validations.php";
include_once "../../core/functions.php";


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $Product_id = $_POST['id'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];

    if (add_to_cart($Product_id,$name,$price)) {
        set_messages('success', "Product added to cart successfully!");
        
    } else {
        set_messages('danger', "Failed to add product to cart!");
    }
    header("Location: ../../index.php");
    exit;
}