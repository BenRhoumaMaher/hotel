<div class="row">
    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Hotels</h5>
                <p class="card-text">number of hotels: <?php echo $hotels->hotels; ?></p>

            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Rooms</h5>

                <p class="card-text">number of rooms: <?php echo $rooms->rooms; ?></p>

            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Admins</h5>

                <p class="card-text">number of admins: <?php echo $admins_count->admins; ?></p>

            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Bookings</h5>

                <p class="card-text">number of Bookings: <?php echo $booking_count->bookings; ?></p>

            </div>
        </div>
    </div>
</div>
<?php require "layouts/footer.php"; ?>