

<!-- Header-->


<?php require_once('inc/header.php'); ?>
<!-- Section-->
<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row">
            <div class="col-4">
                <div class="border p-2">
                    <div class="products">
                        <ul class="list-unstyled">
                        <?php
               
                if (!empty(get_cart())){
                    $total = 0;
            foreach (get_cart() as $item){
                $item_total = $item['price'] * $item['quantity'];
                $total += $item_total;
    
                    echo " 
    <li class='border p-2 my-1'> {$item['name']} -
    <span class='text-success mx-2 mr-auto bold'>{$item['quantity']} x {$item['price'] }$  = {$item_total}$ </span>
            </li>
                        "
                        ; }}?>
                        </ul>
                    </div>
                    <h3>Total : <?=$total?> $</h3>
                </div>
            </div> 
            
            <div class="col-8">
                <form action="handler/checkout/create.php" class="form border my-2 p-3 "method="post">
                    <div class="mb-3">
                        <div class="mb-3">
                            <label for="">Name</label>
                            <input type="text" name="name" id="" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="">Email</label>
                            <input type="email" name="email_ch" id="" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="">Address</label>
                            <input type="text" name="address" id="" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="">Phone</label>
                            <input type="number" name="phone" id="" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="">Notes</label>
                            <input type="text" name="notes" id="" class="form-control">
                        </div>
                        <div class="mb-3">
                            <input type="submit" value="Send" id="" class="btn btn-success">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<?php require_once('inc/footer.php'); ?>