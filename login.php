
<?php
include "inc/header.php";

// if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
//     $email = $_POST['email'];
//     $password = $_POST['password'];

//     if (login_user($email, $password)) {
//         set_messages('success', "Login successfully");
//         header("location: form_emp.php");
//         exit;
//     }else{

//         set_messages('danger', "fail Login try again !!");
//         $_SESSION['old_email'] = $email;
//         $_SESSION['old_password'] = $password;
//             header("location: login.php");
//         exit;
//     }
// }

?>


<h2>Login</h2>
<form action="#" method="POST" class="form border my-2 p-3">
                    <div class="mb-3">
                        <div class="mb-3">
                            <label for="">Email</label>
                            <input type="email" name="email" id="email" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="">Password</label>
                            <input type="password" name="password" id="password" class="form-control">
                        </div>
                        <div class="mb-3">
                            <input type="submit" value="Send" id="" class="btn btn-success">
                        </div>
                    </div>
                </form>

<?php include "inc/footer.php"; ?>