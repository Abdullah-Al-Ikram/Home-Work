<?php
require_once 'db.php';


$query = "SELECT id, name, email, photo, status FROM users";
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
    $users = mysqli_fetch_all($result, true);
}


include_once 'view/users.view.php';