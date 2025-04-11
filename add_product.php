<?php require_once('inc/header.php'); ?>

<!-- Section -->
<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row">
            <div class="col-12">
<div class="content">


<!-- enctype="multipart/form-data" -->

<form  method="post" action="handler/product/create.php">
<div class="mb-3">
        <label for="name" class="form-label">Product Name</label>
        <input type="text" id="name" name="name" class="form-control">
    </div>
        <div class="mb-3">
        <label for="price" class="form-label">Price after discount</label>
        <input type="number" id="price" name="price" class="form-control">
    </div>

    <div class="mb-3">
        <label for="original_price" class="form-label">Price before discount</label>
        <input type="number" id="original_price" name="original_price" class="form-control">
    </div>


  <div class="mb-3">
  <label for="type" class="form-label">Rating</label>
    <select  name="rating"  id="type" class="form-select">
      <option value="1">One</option>
      <option value="2">Two</option>
      <option value="3">Three</option>
      <option value="4">four</option>
      <option value="5">five</option>
      <!-- <option value="20">twenty</option> -->
    </select>
  </div>

  <div class="mb-3">
    <label for="image" class="form-label">Choose Image</label>
    <input type="file" class="form-control" id="image" name="image" accept="image/*" aria-label="image"  >
</div>

  <div class="mb-3">
    <button class="btn btn-success" type="submit" >Submit Add</button>
  </div>

</form>
            </div>
        </div>
    </div>
</section>


<?php require_once('inc/footer.php'); ?>