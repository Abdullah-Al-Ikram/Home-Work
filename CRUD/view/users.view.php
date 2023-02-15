<?php
    require 'layouts/header.view.php';
?>
<section class="mt-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3>All Users</h3>
                    </div>
                    <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>SI</th>
                                <th>Photo</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                foreach($users as $key=> $user){
                            ?>

                            <tr>
                                <td><?= ++$key?></td>
                                <td><img src="upPhotos/<?= $user['photo']?>" width="80" alt=""></td>
                                <td><?= $user['name']?></td>
                                <td><?= $user['email']?></td>
                                <td>
                                    <span class="badge <?= $user['status'] == 1? 'bg-success' : 'bd-warning' ?> "><?= $user['status'] == 1? "Active" : "Deactive" ?></span>
                                    
                                </td>
                                <td>
                                    <a href="user.php?id=<?= $user['id']?>" class="btn btn-info btn-sm">View</a>
                                    <a href="edit.php?id=<?= $user['id']?>" class="btn btn-primary btn-sm">Edit</a>
                                    <a href="delete.php?id=<?= $user['id']?>" class="btn btn-danger btn-sm">Delete</a>
                                    <a href="status.php?id=<?= $user['id']?>" class="btn btn-sm <?= $user['status'] == 1? 'bg-warning' : 'bd-success' ?> "><?= $user['status'] == 1? "Deactive" : "Active" ?></a>
                                </td>
                            </tr>

                            <?php
                                }                            
                            ?>
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
    require 'layouts/footer.view.php';
?>
