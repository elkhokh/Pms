<?php require_once('inc/header.php'); ?>

<!-- Section -->
<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row">
            <div class="col-12">
 
    <h4 class="mt-5">Order List</h4>

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