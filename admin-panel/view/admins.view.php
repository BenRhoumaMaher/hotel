<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <?php $messageHandler = new MessageHandler(); ?>
                <div><span class="text-success"><?= $messageHandler->getMessage(); ?></span></div>
                <h5 class="card-title mb-4 d-inline">Admins</h5>
                <a href="<?php echo ADMIN_PATH; ?>/admins/create-admins.php"
                    class="btn btn-primary mb-4 text-center float-right">Create Admins</a>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col">name</th>
                            <th scope="col">email</th>
                            <th scope="col">delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($admins as $adm) : ?>
                        <tr>
                            <td><?php echo $adm->id ?></td>
                            <td><?php echo $adm->name ?></td>
                            <td><?php echo $adm->email ?></td>
                            <td><a href="delete-admin.php?id=<?php echo $adm->id; ?>"
                                    class="btn btn-danger  text-center ">Delete </a></td>

                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<?php require "../layouts/footer.php"; ?>