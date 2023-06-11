<div class="container">
    <?php  if(count($bookings) > 0) : ?>
    <table class="table mt-5 mb-3">
        <thead>
            <tr>
                <th scope="col">check_in</th>
                <th scope="col">check_out</th>
                <th scope="col">email</th>
                <th scope="col">phone_number</th>
                <th scope="col">full_name</th>
                <th scope="col">hotel_name</th>
                <th scope="col">room_name</th>
                <th scope="col">status</th>
                <th scope="col">payment</th>
                <th scope="col">created_at</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($bookings as $booking) : ?>
            <tr>
                <td><?php echo $booking->check_in; ?></td>
                <td><?php echo $booking->check_out; ?></td>
                <td><?php echo $booking->email; ?></td>
                <td><?php echo $booking->phone; ?></td>
                <td><?php echo $booking->name; ?></td>
                <td><?php echo $booking->hotel; ?></td>
                <td><?php echo $booking->room; ?></td>
                <td><?php echo $booking->status; ?></td>
                <td><?php echo $booking->payment; ?></td>
                <td><?php echo $booking->created_at; ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php else : ?>
    <div class="alert alert-primary" role="alert">
        You have not made any bookings yet!
    </div>
    <?php endif; ?>
</div>
<?php require "../include/footer.php"; ?>