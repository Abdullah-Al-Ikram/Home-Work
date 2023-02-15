<?php

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'user_management');


try{
    $connect = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
}
catch(Exception $e){
    echo "Database Connection Error!" . $e->getMessage();
}