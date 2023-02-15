<?php
    require 'layouts/header.view.php';
?>
<section class="mt-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <?php
                    if(isset($message))
                    {
                ?>
                    <div class="alert <?= $message_type == 'success' ? 'alert-success' : 'alert-danger'?>">
                        <?= $message ?>
                    </div>
                <?php
                    }
                ?>
                <div class="card">
                    <div class="card-header">
                        <h3>Sign Up</h3>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label class="form-label">Full Name</label>
                                <input type="text" name="name" class="form-control">
                                <?php
                                    if(isset($errors['nameError']))
                                    {
                                        printf("<p class='text-danger'>%s </p>",  $errors['nameError']);
                                    }
                                ?>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Email address</label>
                                <input type="email" name="email" class="form-control">
                                <?php
                                    if(isset($errors['emailError']))
                                    {
                                        printf("<p class='text-danger'>%s </p>",  $errors['emailError']);
                                    }
                                ?>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                <input type="password" name="password" class="form-control">
                                <?php
                                    if(isset($errors['passError']))
                                    {
                                        printf("<p class='text-danger'>%s </p>",  $errors['passError']);
                                    }
                                ?>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Select Photo</label>
                                <input type="file" name="photo" class="form-control">
                                <?php
                                    if(isset($errors['photoError']))
                                    {
                                        printf("<p class='text-danger'>%s </p>",  $errors['photoError']);
                                    }
                                ?>
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary">SIgn Up</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
    include 'layouts/footer.view.php';
?>
