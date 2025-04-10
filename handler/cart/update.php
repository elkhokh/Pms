<?php
session_start();
include_once "../../core/functions.php";


if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update_quantity'])) 
{
    $product_id = $_POST['id'];
    $quantity = (int)($_POST['quantity']);

    if ($quantity <= 0) {
        set_messages('danger', "Quantity must be greater than 0");
        header("Location: ../../cart.php");
        exit;
    }

    if (update_item_from_cart($product_id, $quantity)) 
    {
        set_messages('success', "Quantity updated");
    } 
    else 
    {
        set_messages('danger', "Failed to update quantity ");
    }
    header("Location: ../../cart.php");
    exit;
}
