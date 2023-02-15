<?php
require_once 'db.php';
//view query
$id = $_GET['id'];
if((int)$id)
{
    $query = "SELECT id, status FROM users where id=$id";
    $result = mysqli_query($connect, $query);
    if(mysqli_num_rows($result) > 0)
    {
        $user = mysqli_fetch_assoc($result);
    }

    if($user['status'] == 1)
    {
        $update = "UPDATE users SET status = 2 WHERE id = $id";
        $result = mysqli_query($connect, $update);
    }  
    else
    {
        $update = "UPDATE users SET status = 1 WHERE id = $id";
        $result = mysqli_query($connect, $update);
    }  
    
    header('location:users.php');
}
