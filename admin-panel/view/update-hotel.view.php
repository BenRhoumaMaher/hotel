<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-5 d-inline">Update Hotel</h5>
                <form method="POST" action="" enctype="multipart/form-data">

                    <div class="form-outline mb-4 mt-4">
                        <label for="exampleFormControlTextarea1">Name</label>
                        <input type="text" name="name" id="form2Example1" class="form-control"
                            value="<?php echo $up_hotels->name; ?>" />
                        <span class="text-danger ps-2"><?= $error_name; ?></span>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Description</label>
                        <textarea class="form-control" name="description" id="exampleFormControlTextarea1"
                            rows="3"><?php echo $up_hotels->description; ?>"</textarea>
                        <span class="text-danger ps-2"><?= $error_description; ?></span>
                    </div>

                    <div class="form-outline mb-4 mt-4">
                        <label for="exampleFormControlTextarea1">Location</label>

                        <input type="text" name="location" id="form2Example1" class="form-control"
                            value="<?php echo $up_hotels->location; ?>" />
                        <span class="text-danger ps-2"><?= $error_location; ?></span>
                    </div>


                    <!-- Submit button -->
                    <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">update</button>


                </form>

            </div>
        </div>
    </div>
</div>
<?php 
require "../layouts/footer.php"; ?>