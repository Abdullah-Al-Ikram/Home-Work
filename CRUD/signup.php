<?php
require_once 'db.php';
    $errors = [];
    if(isset($_POST['submit']))
    {
        $name = trim(htmlentities($_POST['name']));
        $email = trim(htmlentities($_POST['email']));
        $password = trim(htmlentities($_POST['password']));
        $password_hash = password_hash($password, PASSWORD_DEFAULT);
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

        if(empty($password))
        {
            $errors['passError'] = 'Enter Your Password!';
        }

        if(empty($photo['name']))
        {
            $errors['photoError'] = 'Select Your Profile Photo!';
        }

        $photoType = ['jpg', 'jpeg', 'png'];
        if($photo['name'])
        {
            $photoExplode = explode('.', $photo['name']);
            $photoExtension = end($photoExplode);
        }

        if(empty($photo['name']))
        {
            $errors['photoError'] = 'Upload Your Profile Photo!';
        }
        else if(!in_array($photoExtension, $photoType))
        {
            $errors['photoError'] = 'Upload Valid Photo!';
        }
        else if($photo['size']>3000000)
        {
            $errors['photoError'] = 'Photo Max Size 3MB!';
        }
        else{
            $photoName ='profile_'.uniqid(). '.' . $photoExtension;
            move_uploaded_file($photo['tmp_name'], 'upPhotos/'. $photoName);
        }

        if(empty($errors))
        {
            $insert = "INSERT INTO users(name, email, password, photo) VALUES ('$name','$email','$password_hash','$photoName')";
            $result = mysqli_query($connect, $insert);
            if($result)
            {
                $message_type = "success";
                $message = "User Insert Successfully!";
            }
            else
            {
                $message_type = "error";
                $message = "User Insert Fail!";
            }
        }
    }
include "view/signup.view.php";