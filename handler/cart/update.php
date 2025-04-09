<?php
// session_start();
// include_once "../../core/functions.php";

// if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update_quantity'])) 
// {
//     $product_id = $_POST['id'] ?? '';
//     $quantity = max(1, (int)($_POST['quantity'] ?? 1));
//     if (update_cart_quantity($product_id, $quantity)) 
//     {
//         set_messages('success', "Quantity updated!");
//     } 
//     else 
//     {
//         set_messages('danger', "Failed to update quantity!");
//     }
//     header("Location: ../../cart.php");
//     exit;
// }