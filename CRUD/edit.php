<?php
require_once 'db.php';
//view query
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


//update query

$errors = [];
    if(isset($_POST['submit']))
    {
        $name = trim(htmlentities($_POST['name']));
        $email = trim(htmlentities($_POST['email']));
        $photo = $_FILES['photo'];

        if(empty($name))
        {
            $errors['nameError'] = 'Enter Your Name!';
        }else if(strlen($name)>30)
        {
            $errors['nameError'] = 'Your Name Is Too Long!';
        }
        else if(strlen($name)<4)
        {
            $errors['nameError'] = 'Your Name Is Too Short!';
        }

        if(empty($email))
        {
            $errors['emailError'] = 'Enter Your Email Address!';
        }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            $errors['emailError'] = 'Enter a Valid Email Address!';
        }



        $photoType = ['jpg', 'jpeg', 'png'];
        if($photo['name'])
        {
            $photoExplode = explode('.', $photo['name']);
            $photoExtension = end($photoExplode);
        }

        if($photo['name'])
        {
            if(!in_array($photoExtension, $photoType))
            {
                $errors['photoError'] = "Upload valid photo!"; 
            }
            else if($photo['size'] > 3000000)
            {
                $errors['photoError'] = "Photo Max Size 3MB!"; 
            }
            else 
            {
                $path = 'upPhotos/'.$user['photo'];
                if(file_exists($path))
                {
                    unlink($path);
                }
                $photoName = 'profile_'.uniqid().'.'.$photoExtension;
                move_uploaded_file($photo['tmp_name'],'upPhotos/'.$photoName);
            }
        }
        else
        {
            $photoName = $user['photo'];
        }
        

        if(empty($errors))
        {
            $update = "UPDATE users SET name = '$name', email = '$email', photo = '$photoName' WHERE id = $id";
            $result = mysqli_query($connect, $update);
            if($result)
            {
                $message_type = "success";
                header('location:users.php');
            }
            else
            {
                $message_type = "error";
            }
        }
    }

include "view/edit.view.php";