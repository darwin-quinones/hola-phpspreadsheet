<?php
$DATABASE = 'hola';
$HOST = 'localhost';
$USER = 'root';
$PASSWORD = '';
$connection = mysqli_connect($HOST, $USER, $PASSWORD);
if(!$connection){
    die('Could not connect to database: '. mysqli_error());
}else{
    $db_select = mysqli_select_db($connection, $DATABASE);
    if(!$db_select){
        die('Error trying to select database'. mysqli_error($connection));
    }
}