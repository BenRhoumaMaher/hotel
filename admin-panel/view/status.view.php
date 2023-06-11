<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-5 d-inline">Update Status</h5>
                <form method="POST" enctype="multipart/form-data">
                    <select style="margin-top: 15px;" class="form-control" name="status">
                        <option disabled hidden selected>Choose Status</option>
                        <option value="1">1</option>
                        <option value="0">0</option>
                    </select>


                    <!-- Submit button -->
                    <button style="margin-top: 10px;" type="submit" name="submit"
                        class="btn btn-primary  mb-4 text-center">update</button>


                </form>

            </div>
        </div>
    </div>
</div>
<?php 
require "../layouts/footer.php"; ?>