<?php

session_start();
include_once "../../core/validations.php";
include_once "../../core/functions.php";


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id = $_POST['id'] ;
    $name = $_POST['name'] ;
    $price = trim($_POST['price']);
    $original_price = trim($_POST['original_price']);
    $rating = $_POST['rating'];
    $image = $_POST['image'];

$error = valid_add_product($name, $price, $original_price,$rating, $image);

    if (!empty($error)) {
        set_messages('danger', $error);
        header("Location: ../../edit_product.php?id=$id");
        exit;
    }

    $update_product = [
        'id' => $id,
        'name' => $name,
        'price' => $price,
        'original_price' => $original_price,
        'rating' => $rating,
        'image' => $image,
    ];

    if(update_product($id, $update_product)){
        set_messages('success', "Porduct updated sucessfully");
        header("Location: ../../show_product.php");
        exit;
    }else{
        set_messages('danger',"Fail update Porduct");
        header("Location: ../../edit_product.php"); 
        exit;
    }
}
