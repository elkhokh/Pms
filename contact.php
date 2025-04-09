<?php require_once('inc/header.php'); ?>

<!-- Header-->

<!-- Section-->
<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row">
            <div class="col-8 mx-auto">
                <form action="handler/contect_us/create.php" method="post" form border my-2 p-3">
                    <div class="mb-3">
                        <div class="mb-3">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="">Email</label>
                            <input type="email" name="email" id="email" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="message">Message</label>
                    
                            <!-- <input type="text" name="message" id="massage" class="form-control"> -->
                            <textarea  name="message" id="message" class="form-control" rows="7"></textarea>
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