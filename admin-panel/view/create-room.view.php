<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-5 d-inline">Create Rooms</h5>
                <form method="POST" action="" enctype="multipart/form-data">
                    <!-- Email input -->
                    <div class="form-outline mb-4 mt-4">
                        <span class="text-danger ps-2"><?= $error_name; ?></span>
                        <input type="text" name="name" id="form2Example1" class="form-control" placeholder="name" />

                    </div>
                    <div class="form-outline mb-4 mt-4">
                        <input type="file" name="image" id="form2Example1" class="form-control" />

                    </div>
                    <div class="form-outline mb-4 mt-4">
                        <span class="text-danger ps-2"><?= $error_price; ?></span>
                        <input type="text" name="price" id="form2Example1" class="form-control" placeholder="price" />

                    </div>
                    <div class="form-outline mb-4 mt-4">
                        <span class="text-danger ps-2"><?= $error_persons; ?></span>
                        <input type="text" name="num_persons" id="form2Example1" class="form-control"
                            placeholder="num_persons" />

                    </div>
                    <div class="form-outline mb-4 mt-4">
                        <span class="text-danger ps-2"><?= $error_beds; ?></span>
                        <input type="text" name="num_beds" id="form2Example1" class="form-control"
                            placeholder="num_beds" />

                    </div>
                    <div class="form-outline mb-4 mt-4">
                        <span class="text-danger ps-2"><?= $error_size; ?></span>
                        <input type="text" name="size" id="form2Example1" class="form-control" placeholder="size" />

                    </div>
                    <div class="form-outline mb-4 mt-4">
                        <span class="text-danger ps-2"><?= $error_view; ?></span>
                        <input type="text" name="view" id="form2Example1" class="form-control" placeholder="view" />

                    </div>
                    <select class="form-control" name="hotel">
                        <option selected disabled hidden>Choose Hotel Name</option>
                        <?php foreach($show_hotels as $hotel) : ?>
                        <option value="<?php echo $hotel->name; ?>"><?php echo $hotel->name; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <br>

                    <select class="form-control" name="hotel_id">
                        <option selected disabled hidden>Choose Same Hotel Once Again</option>
                        <?php foreach($show_hotels as $hotel) : ?>
                        <option value="<?php echo $hotel->id; ?>"><?php echo $hotel->name; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <br>

                    <!-- Submit button -->
                    <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">create</button>


                </form>

            </div>
        </div>
    </div>
</div>
<?php 
require "../layouts/footer.php"; ?>