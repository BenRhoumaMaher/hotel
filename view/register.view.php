<div class="hero-wrap js-fullheight" style="background-image: url('<?php echo ROOT; ?>/images/image_2.jpg');"
    data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-start"
            data-scrollax-parent="true">
            <div class="col-md-7 ftco-animate">
            </div>
        </div>
    </div>
</div>

<section class="ftco-section ftco-book ftco-no-pt ftco-no-pb">
    <div class="container">
        <div class="row justify-content-middle" style="margin-left: 397px;">
            <div class="col-md-6 mt-5">
                <form class="appointment-form" style="margin-top: -568px;" method="POST">
                    <h3 class="mb-3">Register</h3>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <span class="text-danger ps-2"><?= $error_username; ?></span>
                                <input type="text" class="form-control" placeholder="Username" name="username">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <span class="text-danger ps-2"><?= $error_email; ?></span>
                                <span class="text-danger ps-2"><?= $error_exist; ?></span>
                                <input type="text" class="form-control" placeholder="Email" name="email">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <span class="text-danger ps-2"><?= $error_password; ?></span>
                                <input type="password" class="form-control" placeholder="Password" name="password">
                            </div>
                        </div>



                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="submit" value="Register" class="btn btn-primary py-3 px-4" name="submit">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<?php require("../include/footer.php"); ?>