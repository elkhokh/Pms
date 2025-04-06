<?php
//htmlspecialchars
/****************************** require function ***************************** */
function valid_data_require($var_input_data,$key_of_var)
{
    return empty($var_input_data) ? "$key_of_var is required" : null;
}

/***************************check validation function ********************************** */ 

function valid_email($email)
{
    return filter_var($email,FILTER_VALIDATE_EMAIL)?null:"invalid email, you hack me man !!";
}
// check validation salary

function valid_phone($phone)
{
    return (is_numeric($phone))?null:"can you enter your phone ture";
}

    function valid_password($password) 
    {
        $uppercase = preg_match('/[A-Z]/', $password);
        $lowercase = preg_match('/[a-z]/', $password);
        $number    = preg_match('/[0-9]/', $password);
        $length    = strlen($password) >= 8;
    
        switch ($password) {
            case !$uppercase:
                return "Password must contain at least one uppercase letter";
            case !$lowercase: 
                return "Password must contain at least one lowercase letter";
            case !$number:
                return "Password must contain at least one number";
            case !$length:
                return "Password must be at least 8 characters long";
            default:
                return null;
        }
    }
   
    function check_confirm_password_valid($password,$password_confirm)
    {
        return ($password===$password_confirm)? null :"confirm Password is NOT the same Password";
    }

/********************************validation of register function *********************************** */
function valid_register($name,$email,$password,$password_confirm){
            
    $data_reg=[
        'name'=>htmlspecialchars($name),
        'email'=>htmlspecialchars($email),
        'password'=>htmlspecialchars($password),
        'password_confirm'=>htmlspecialchars($password_confirm),
];

    foreach($data_reg as $key =>$value)
    {
        if(valid_data_require($value,$key)){
            return $type_of_error = valid_data_require($value,$key);
        }
    }
    

if( valid_email($email))
        {
    return $type_of_error=valid_email($email); 
    }

if(   valid_password($password))
    {
    return $type_of_error =valid_password($password);
    }

if( check_confirm_password_valid($password,$password_confirm))
    {
    return $type_of_error= check_confirm_password_valid($password,$password_confirm); 
    }

    return null; 
}
/**************************** login validation function ********************************* */





















// //  
// function valid_login($email,$password){
//     $data_reg=[
//         'email'=>$email,
//         'password'=>$password,
//     ];
//     $type_of_error = [];
    
//     foreach($data_reg as $key =>$value){
//         if($type_of_error==valid_data_require($value,$key)){
//             return $type_of_error[] = 'data is required';}
//     }
    
//     if($type_of_error == valid_email($email)){
//         return $type_of_error[] = 'valid email, you hack me man !!';
//     }
    
//         return !$type_of_error ? $data_reg : $type_of_error; 
// }



?>

