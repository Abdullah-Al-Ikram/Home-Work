<?php require 'layouts/header.view.php'; ?>
<section class="mt-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3>User</h3>
                    </div>
                    <div class="card-body">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td width="15%">ID</td>
                                <td width="5%">:</td>
                                <td><?= $user['id']?></td>
                            </tr>
                            <tr>
                                <td width="15%">Name</td>
                                <td width="5%">:</td>
                                <td><?= $user['name']?></td>
                            </tr>
                            <tr>
                                <td width="15%">Email</td>
                                <td width="5%">:</td>
                                <td><?= $user['email']?></td>
                            </tr>
                            <tr>
                                <td width="15%">Status</td>
                                <td width="5%">:</td>
                                <td><?= $user['status']?></td>
                            </tr>
                            <tr>
                                <td width="15%">Photo</td>
                                <td width="5%">:</td>
                                <td><img src="upPhotos/<?= $user['photo']?>" width="120" alt=""></td>
                            </tr>
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php require 'layouts/footer.view.php'; ?>
