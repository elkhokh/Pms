<?php require_once('inc/header.php'); ?>

<!-- Section -->
<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row">
            <div class="col-lg-6 col-md-8 mx-auto">
                <!-- Card for Contact Form -->
                <div class="card shadow-sm border-0 rounded">
                    <div class="card-body p-5">
                        <!-- Header -->
                        <div class="text-center mb-4">
                            <h3 class="fw-bold text-primary"><i class="bi bi-envelope-paper-fill me-2"></i>Contact Us</h3>
                            <p class="text-muted">We'd love to hear from you! Send us a message.</p>
                        </div>

                        <!-- Contact Form -->
                        <form action="handler/contect_us/create.php" method="POST" class="form">
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
                                    <input type="text" name="name" id="name" class="form-control" placeholder="Enter your full name" required>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-envelope-fill"></i></span>
                                    <input type="email" name="email" id="email" class="form-control" placeholder="Enter your email" >
                                </div>
                            </div>
                            <div class="mb-4">
                                <label for="message" class="form-label">Message</label>
                                <textarea name="message" id="message" class="form-control" rows="7" placeholder="Write your message here..." ></textarea>
                            </div>
                            <div class="text-end">
                                <button type="submit" class="btn btn-success btn-lg px-4">
                                    <i class="bi bi-send-fill me-2"></i>Send Message
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require_once('inc/footer.php'); ?>