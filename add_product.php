<?php require_once('inc/header.php'); ?>

<!-- Section -->
<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row">
            <div class="col-12">
      
<div class="content">

    <?php
//  "name": "Smart Watch",
//  "price": 2500.00,
//  "original_price": 5000.00,
//  "rating": 3,
//  "image": "assets/pic/image.png"
// Receeive data from the form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $salary = $_POST['salary'];
    $phone = $_POST['phone'];
    $type = $_POST['type'];
    //---------------------
    // validate Data
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<div class='alert alert-danger'>Invalid email address</div>";
    }

    $cleanName = filter_var($name, FILTER_SANITIZE_STRING);

    $empData = array(
        "name" => $cleanName,
        "email" => $email,
        "salary" => $salary,
        "phone" => $phone,
        "type" => $type,
    );

    $empText = implode(", ",$empData) . "\n";

    file_put_contents('emp.txt',$empText,FILE_APPEND);

    echo "<div class='alert alert-success mt-3'>Emplyee added successfully</div>";
}
?>
<div class="container mt-5">
    <h2 class="mt-5">Add product</h2>
    <form method="POST">
        <div class="mb-3">
            <label for="name" class="form-label">Name of product</label>
            <input type="text" id="name" name="name" class="form-control">
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">price</label>
            <input type="number" id="price" name="price" class="form-control">
        </div>

        <div class="mb-3">
            <label for="salary" class="form-label">price after discount</label>
            <input type="number" id="salary" name="price" class="form-control">
        </div>

        <div class="mb-3">
            <label for="phone" class="form-label">image path</label>
            <input type="text" id="phone" name="image" class="form-control">
        </div>
        
        <div class="mb-3">
            <label for="rating" class="form-label">Rating</label>
            <input type="number" id="number" name="rating" class="form-control">
        </div>

        <!-- <div class="input-group mb-3">
  <label class="input-group-text" for="inputGroupSelect01">Rating</label>
  <select class="form-select" id="inputGroupSelect01">
    <option selected>Choose...</option>
    <option value="1">One</option>
    <option value="2">Two</option>
    <option value="3">Three</option>
    <option value="4">four</option>
    <option value="5">five</option>
  </select>
</div> -->


        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    <h2 class="mt-5">Employee List</h2>

    <table class="table table-success table-striped-columns">
        <thead>
            <tr>
                <th>Name of product</th>
                <th>Price after discount</th>
                <th>original price</th>
                <th>Rating </th>
                <th>image path</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // if(file_exists('emp.txt')){
            //     $fileContent = file_get_contents('emp.txt');

            //     $emps = explode("\n",$fileContent);

            //     foreach($emps as $emp){
            //         if(!empty($emp)){
            //             echo "<tr><td>" . str_replace(", " , "</td><td>",$emp) . "</td></tr>";
            //         }
            //     }
            // }
            ?>
        </tbody>
    </table>
            </div>
        </div>
    </div>
</section>


<?php require_once('inc/footer.php'); ?>