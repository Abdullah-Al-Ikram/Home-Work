<?php
require_once 'db.php';

$id = $_GET['id'];
if((int)$id)
{
    $query = "SELECT id, name, email, photo, status FROM users where id=$id";
    $result = mysqli_query($connect, $query);
    if(mysqli_num_rows($result) > 0)
    {
        $user = mysqli_fetch_assoc($result);
    }
}
include 'view/user.view.php';