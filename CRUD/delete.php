<?php
require_once 'db.php';
//view query
$id = $_GET['id'];
if((int)$id)
{
    $query = "SELECT id,photo, status FROM users where id=$id";
    $result = mysqli_query($connect, $query);
    if(mysqli_num_rows($result) > 0)
    {
        $user = mysqli_fetch_assoc($result);
    }
    $path = 'upPhotos/'.$user['photo'];
    if(file_exists($path))
    {
        unlink($path);
    }
    $delete = "DELETE FROM users WHERE id= $id";
    $result = mysqli_query($connect, $delete);
    header('location:users.php');
}

