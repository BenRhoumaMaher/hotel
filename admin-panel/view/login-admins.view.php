<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title mt-5">Login</h5>
                <form method="POST" class="p-auto">
                    <!-- Email input -->
                    <div class="form-outline mb-4">
                        <span class="text-danger ps-2"><?= $errorcredentialsadmin; ?></span>
                        <span class="text-danger ps-2"><?= $erroremail; ?></span>
                        <input type="text" name="email" id="form2Example1" class="form-control" placeholder="Email" />

                    </div>


                    <!-- Password input -->
                    <div class="form-outline mb-4">
                        <span class="text-danger ps-2"><?= $errorpassword; ?></span>
                        <input type="password" name="password" id="form2Example2" placeholder="Password"
                            class="form-control" />

                    </div>



                    <!-- Submit button -->
                    <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">Login</button>


                </form>

            </div>
        </div>
        <?php require "../layouts/footer.php"; ?>