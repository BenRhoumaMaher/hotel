<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <?php $messageHandler = new MessageHandler(); ?>
                <div><span class="text-success"><?= $messageHandler->getMessage(); ?></span></div>
                <h5 class="card-title mb-4 d-inline">Hotels</h5>
                <a href="create-hotels.php" class="btn btn-primary mb-4 text-center float-right">Create Hotels</a>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col">name</th>
                            <th scope="col">location</th>
                            <th scope="col">status value</th>
                            <th scope="col">change status</th>
                            <th scope="col">update</th>
                            <th scope="col">delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($show_hotels as $hotel) : ?>
                        <tr>
                            <td><?php echo $hotel->id; ?></td>
                            <td><?php echo $hotel->name; ?></td>
                            <td><?php echo $hotel->location; ?></td>
                            <td><?php echo $hotel->status; ?></td>
                            <td><a href="status-hotels.php?id=<?php echo $hotel->id; ?>"
                                    class="btn btn-info text-white text-center ">status</a>
                            </td>
                            <td><a href="update-hotels.php?id=<?php echo $hotel->id; ?>"
                                    class="btn btn-warning text-white text-center ">Update
                                </a></td>
                            <td><a href="delete-hotels.php?id=<?php echo $hotel->id; ?>"
                                    class="btn btn-danger  text-center ">Delete </a></td>
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