<?php

/************************* golbal variables*************************** */
$json_file_checkout=realpath(__DIR__ . "/../data/checkout.json");
$json_file_user=realpath(__DIR__ . "/../data/user.json");
$json_file_contect_us=realpath(__DIR__ . "/../data/contect_us.json");
$json_file_product=realpath(__DIR__ . "/../data/product.json");
$json_file_cart=realpath(__DIR__ . "/../data/cart.json");
// print_r($json_file_user); exit;

/***********************************global functions ************************************ */


/*********************************** message function ******************************************** */
function set_messages($type_of_alert,$message_of_error)
{
    $_SESSION['message']=[
        'type'=>$type_of_alert,
        'text'=>$message_of_error,
    ];
}

function show_message()
{
    if(isset($_SESSION['message'])){
        $type = $_SESSION['message']['type'];//success or danger
        $text = $_SESSION['message']['text'];// email or name etc 
        echo "<div class='alert alert-$type'>$text</div>";
        unset($_SESSION['message']);
    }   
}


/****************************** register function ******************************** */

function register_user($name,$email,$password){
    $user_file = $GLOBALS['json_file_user'];
    $users = file_exists($user_file) ? json_decode(file_get_contents($user_file), true) : [];
    if(!is_array($users)){
        $users = [];
    }
    // $data= get_data_from_json($GLOBALS['json_file_user']);
    $id = empty($users) ? 1 :  max(array_column($users,'id')) + 1 ;
    // $hashpassowrd=password_hash($password,PASSWORD_DEFAULT);
    $data =[
        'id'=>$id , 
        'name'=>$name,
        'email'=>$email,
        'password'=>password_hash($password,PASSWORD_DEFAULT)
    ];
        // set_data_in_json($data , $GLOBALS['json_file_user']);
    $users[] = $data;
    file_put_contents($user_file, json_encode($users, JSON_PRETTY_PRINT));
    $_SESSION['user'] = [
        'name' => $name,
        'email' => $email
    ];
    // return true;
        // create_user_session([
        //     'name'=>$name,
        //     'email'=>$email,
        // ]);
    return true;
}

/********************************************************************************************** */
function login_user($email,$password){
    // $data= get_data_from_json($GLOBALS['json_file_user']);
    // $users = is_array($data) ? $data : [];
    $file = $GLOBALS['json_file_user'];
    $users = file_exists($file) ? json_decode(file_get_contents($file), true) : [];

    if(!is_array($users))
    {
        $users = [];
    }
    foreach($users as $user)
    {
        if($user['email'] == $email && password_verify($password,$user['password'])){
            // create_user_session([
            //     'email'=>$email,
            //     'name'=>$user['name']
            // ]);
            // session_start();
            $_SESSION['user'] = [
                'name' => $user['name'],
                'email' =>  $user['email']
            ];
            // print_r( $_SESSION['user']); exit;
            return true; 
        }
    }
    return false;
}
/**********************************function of login admin *********************************** */
function login_admin($email,$password){
if($email==="admin@gmail.com"  &&  $password==="123456"){
    return true;
}
return false;
}
/************************************ fucntion of contect us********************************** */
function contect_from__user($name,$email,$message){
    $contect_file = $GLOBALS['json_file_contect_us'];
    $users = file_exists($contect_file) ? json_decode(file_get_contents($contect_file), true) : [];
    if(!is_array($users))
    {
        $users = [];
    }
    // $data= get_data_from_json($GLOBALS['json_file_user']);
    $id = empty($users) ? 1 :  max(array_column($users,'id')) + 1 ;
    $data =[
        'id'=>$id , 
        'name'=>$name,
        'email'=>$email,
        'massage'=>$message
    ];
        // set_data_in_json($data , $GLOBALS['json_file_user']);
    $users[] = $data;
    file_put_contents($contect_file, json_encode($users, JSON_PRETTY_PRINT));
    return true;
}

/************************************** function add to cart****************** */

function get_products()
{
    $products_file = $GLOBALS['json_file_product'];
 return file_exists($products_file) ? json_decode(file_get_contents($products_file), true) : [];
 
}

function get_cart()
{
    $products_file = $GLOBALS['json_file_cart'];
 return file_exists($products_file) ? json_decode(file_get_contents($products_file), true) : [];
 
}

function set_cart(){
    $cart_file= $GLOBALS['json_file_product'];
    $carts=file_exists($cart_file) ? json_decode(file_get_contents($cart_file), true) : [];
    if(!is_array($carts))
    {
     $carts = [];
    }
    return true;
}

/******************************************** function add to cart **************************************** */
function add_to_cart($Product_id, $name, $price, $quantity = 1) {
    $cart_file = $GLOBALS['json_file_cart'];
    $carts = file_exists($cart_file) ? json_decode(file_get_contents($cart_file), true) : [];
    
    if (!is_array($carts)) {
        $carts = [];
    }

    foreach ($carts as &$cart) { 
        if ($cart['Product_id'] == $Product_id) {
            
            $cart['quantity'] += $quantity;
            file_put_contents($cart_file, json_encode($carts, JSON_PRETTY_PRINT));
            return "updated"; 
        }
    }

    $id = empty($carts) ? 1 : max(array_column($carts, 'id')) + 1;
    $product_in_cart = [
        "id" => $id,
        "Product_id" => $Product_id,
        "price" => $price,
        "name" => $name,
        "quantity" => $quantity
    ];

    $carts[] = $product_in_cart;
    file_put_contents($cart_file, json_encode($carts, JSON_PRETTY_PRINT));
    return "added"; 
}

 /******************** function of edit quantity******************** */
function update_item_from_cart($product_id, $update_quantity) {
    $cart_file = $GLOBALS['json_file_cart'];
    $carts = file_exists($cart_file) ? json_decode(file_get_contents($cart_file), true) : [];
    if (!$carts) {
        return false;
    }
    $found = false;
    foreach ($carts as &$cart) {
        if ($cart['id'] == $product_id) {
            $cart['quantity'] = $update_quantity; // Fix: Use $update_quantity directly
            $found = true;
            break;
        }
    }
    if (!$found) {
        return false;
    }
    file_put_contents($cart_file, json_encode($carts, JSON_PRETTY_PRINT));
    return true;
}
/****************************** function of delete****************************** */

function delete_from_cart($Product_id){
    $product_file = $GLOBALS['json_file_cart'];

    if(!file_exists($product_file)){
        return false;
    }
    
    $item = json_decode(file_get_contents($product_file),true);
    if(!$item){
        return false;
    }
    $found = false;
    foreach($item as $key => $emp){
        if($emp['id'] == $Product_id){
            unset($item[$key]);
            $found = true;
            break;
        }
    }
    if(!$found){
        return false;
    }
    $item = array_values($item);
    file_put_contents($product_file, json_encode($item, JSON_PRETTY_PRINT));
    return true;
}

/********************************chechout function *************************************** */

function checkout($name, $email, $phone, $address, $notes) {
    $contect_file = $GLOBALS['json_file_checkout'];
    $users = file_exists($contect_file) ? json_decode(file_get_contents($contect_file), true) : [];
    if (!is_array($users)) {
        $users = [];
    }

    $cart_items = get_cart(); 
    $total_price = 0;
    foreach ($cart_items as $item) {
        $total_price += $item['price'] * $item['quantity'];
    }

    $id = empty($users) ? 1 : max(array_column($users, 'id')) + 1;
    $data = [
        'id' => $id,
        'name' => $name,
        'email_ch' => $email,
        'phone' => $phone,
        'address' => $address,
        'notes' => $notes,
        'cart' => $cart_items, 
        'total_price' => $total_price ,
        "status" => "pending",
        "created_at" => date("Y-m-d H:i:s")
    ];

    $users[] = $data;
    file_put_contents($contect_file, json_encode($users, JSON_PRETTY_PRINT));

    
    file_put_contents($GLOBALS['json_file_cart'], json_encode([], JSON_PRETTY_PRINT));
    return true;
}

/*************************** admain add product function ******************************** */


function add_product($name, $price, $original_price,$rating,$image){
    $product_file = $GLOBALS['json_file_product'];
    $products = file_exists($product_file) ? json_decode(file_get_contents($product_file), true) : [];
    if(!is_array($products)){
        $products = [];
    }

    $id = empty($products) ? 1 :  max(array_column($products,'id')) + 1 ;
    $product =[
        'id'=>$id , 
        'name'=>$name , 
        'price'=>$price,
        'original_price'=>$original_price,
        'rating'=>$rating,
        'image'=>$image
    ];
        // set_data_in_json($data , $GLOBALS['json_file_user']);
    $products[] = $product;
    file_put_contents($product_file, json_encode($products, JSON_PRETTY_PRINT));

    return true;
}
/************** function delete from product file *************************** */
function delete_porduct($product_id){

$product_file = $GLOBALS['json_file_product'];

if(!file_exists($product_file)){
    return false;
}

$item = json_decode(file_get_contents($product_file),true);
if(!$item){
    return false;
}
$found = false;
foreach($item as $key => $emp){
    if($emp['id'] == $product_id){
        unset($item[$key]);
        $found = true;
        break;
    }
}
if(!$found){
    return false;
}
$item = array_values($item);
file_put_contents($product_file, json_encode($item, JSON_PRETTY_PRINT));
return true;
}

/*********** function update************************************ */

function update_product($id, $update_product){
    $product_file = $GLOBALS['json_file_product'];
    $products = file_exists($product_file) ? json_decode(file_get_contents($product_file), true) : [];
    if (!$products) {
        return false;
    }
    $found = false;
    foreach ($products as &$product) {
        if ($product['id'] == $id) {
            $product['name'] = $update_product['name']; 
            $product['price'] = $update_product['price'];
            $product['original_price'] = $update_product['original_price'];
            $product['rating'] = $update_product['rating']; 
            $product['image'] = $update_product['image']; 
            $found = true;
            break;
        }
    }
    if (!$found) {
        return false;
    }
    file_put_contents($product_file, json_encode($products, JSON_PRETTY_PRINT));
    return true;
}

function show_orders() {
    $checkout_file = $GLOBALS['json_file_checkout'];
 return file_exists($checkout_file) ? json_decode(file_get_contents($checkout_file), true) : [];
 
}


/******************************************** function add to cart **************************************** */

// function add_to_cart($Product_id,$name,$price, $quantity = 1) {
//     $cart_file= $GLOBALS['json_file_cart'];
//     $carts=file_exists($cart_file) ? json_decode(file_get_contents($cart_file), true) : [];
//     if(!is_array($carts))
//     {
//      $carts = [];
//     }
//     $id = empty($carts) ? 1 : max(array_column($carts,'id')) + 1;
//         $product_in_cart= [
//             "id" => $id,
//             "Product_id"=>$Product_id,
//             "price" => $price,
//             "name" => $name,
//             "quantity" => $quantity
//         ];
//         $carts[] = $product_in_cart;
//         file_put_contents($cart_file, json_encode($carts, JSON_PRETTY_PRINT));
//         return true;
//     }

























