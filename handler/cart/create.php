<?php
session_start();
include_once "../../core/validations.php";
include_once "../../core/functions.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $Product_id = $_POST['id'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $quantity = isset($_POST['quantity']) ? (int)$_POST['quantity'] : 1;

    $result = add_to_cart($Product_id, $name, $price, $quantity);
    
    if ($result === "added") {
        set_messages('success', "Product added to cart successfully");
    } elseif ($result === "updated") {
        set_messages('success', "Product already in cart, quantity updated");
    } else {
        set_messages('danger', "Failed to add product to cart");
    }
    
    header("Location: ../../index.php");
    exit;
}

/************************************************************ */

// if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//     $Product_id = $_POST['id'];
//     $name = $_POST['name'];
//     $price = $_POST['price'];
//     $quantity = $_POST['quantity'];

//     if (add_to_cart($Product_id,$name,$price)) {
//         set_messages('success', "Product added to cart successfully!");
        
//     } else {
//         set_messages('danger', "Failed to add product to cart!");
//     }
//     header("Location: ../../index.php");
//     exit;
// }