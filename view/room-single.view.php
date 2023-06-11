<div class="hero-wrap js-fullheight"
    style="background-image: url('<?php echo ROOMSIMAGES; ?>/<?php echo $singleroom->image; ?>');"
    data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-start"
            data-scrollax-parent="true">
            <div class="col-md-7 ftco-animate">
                <h2 class="subheading">Welcome to Maher's Hotel</h2>
                <h1 class="mb-4"><?php echo $singleroom->name; ?></h1>
            </div>
        </div>
    </div>
</div>

<section class="ftco-section ftco-book ftco-no-pt ftco-no-pb">
    <div class="container">
        <div class="row justify-content-end">
            <div class="col-lg-4">
                <form class="appointment-form" style="margin-top: -568px;" method="POST">
                    <h3 class="mb-3">Book this room</h3>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <span class="text-danger ps-2"><?= $erroremail; ?></span>
                                <input type="text" class="form-control" placeholder="Email" name="email">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <span class="text-danger ps-2"><?= $errorname; ?></span>
                                <input type="text" class="form-control" placeholder="Full Name" name="name">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <span class="text-danger ps-2"><?= $errorphone; ?></span>
                                <input type="text" class="form-control" placeholder="Phone Number" name="phone">
                            </div>
                            <span class="text-danger ps-2"><?= $errorcheckdate; ?></span>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="input-wrap">
                                    <div class="icon"><span class="ion-md-calendar"></span></div>
                                    <span class="text-danger ps-2"><?= $errorin; ?></span>
                                    <input type="text" class="form-control appointment_date-check-in"
                                        placeholder="Check-In" name="in">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="icon"><span class="ion-md-calendar"></span></div>
                                <span class="text-danger ps-2"><?= $errorout; ?></span>
                                <input type="text" class="form-control appointment_date-check-out"
                                    placeholder="Check-Out" name="out">
                            </div>
                        </div>


                        <?php if(isset($_SESSION['username'])) : ?>
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="submit" name="submit" value="Book and Pay Now"
                                    class="btn btn-primary py-3 px-4">
                            </div>
                        </div>
                        <?php else : ?>
                        <p>Login in order to book a room</p>
                        <?php endif; ?>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>






<section class="ftco-section bg-light">
    <div class="container">
        <div class="row no-gutters">
            <div class="col-md-6 wrap-about">
                <div class="img img-2 mb-4" style="background-image: url(<?php echo ROOT; ?>/images/image_2.jpg);">
                </div>
                <h2>The most recommended vacation rental</h2>
                <p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a
                    paradisematic country, in which roasted parts of sentences fly into your mouth. Even the
                    all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One
                    day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World
                    of Grammar.</p>
            </div>
            <div class="col-md-6 wrap-about ftco-animate">
                <div class="heading-section">
                    <div class="pl-md-5">
                        <h2 class="mb-2">What we offer</h2>
                    </div>
                </div>
                <div class="pl-md-5">
                    <p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It
                        is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
                    <div class="row">
                        <?php foreach($utilities as $ut) : ?>
                        <div class="services-2 col-lg-6 d-flex w-100">
                            <div class="icon d-flex justify-content-center align-items-center">
                                <span class="<?php echo $ut->icon; ?>"></span>
                            </div>
                            <div class="media-body pl-3">
                                <h3 class="heading"><?php echo $ut->name; ?></h3>
                                <p><?php echo $ut->description; ?></p>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="ftco-intro" style="background-image: url(<?php echo ROOT; ?>/images/image_2.jpg);"
    data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9 text-center">
                <h2>Ready to get started</h2>
                <p class="mb-4">It’s safe to book online with us! Get your dream stay in clicks or drop us a line with
                    your questions.</p>
                <p class="mb-0"><a href="#" class="btn btn-primary px-4 py-3">Learn More</a> <a href="#"
                        class="btn btn-white px-4 py-3">Contact us</a></p>
            </div>
        </div>
    </div>
</section>
<?php require("../include/footer.php"); ?>