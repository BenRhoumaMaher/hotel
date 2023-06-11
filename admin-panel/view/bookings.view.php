<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-4 d-inline">Bookings</h5>

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">check in</th>
                            <th scope="col">check out</th>
                            <th scope="col">email</th>
                            <th scope="col">phone number</th>
                            <th scope="col">full name</th>
                            <th scope="col">room name</th>
                            <th scope="col">status</th>
                            <th scope="col">payment</th>
                            <th scope="col">update status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php  foreach($show_bookings as $booking) : ?>
                        <tr>
                            <td><?php  echo $booking->check_in ?></td>
                            <td><?php  echo $booking->check_out ?></td>
                            <td><?php  echo $booking->email ?></td>
                            <td><?php  echo $booking->phone ?></td>
                            <td><?php  echo $booking->name ?></td>
                            <td><?php  echo $booking->room ?></td>
                            <td><?php  echo $booking->status ?></td>
                            <td><?php  echo $booking->payment ?></td>

                            <td><a href="status-bookings.php?id=<?php  echo $booking->id ?>"
                                    class="btn btn-info  text-center ">Update status</a></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php 
require "../layouts/footer.php";
?>