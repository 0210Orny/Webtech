<?php

$host="localhost";
$user="root";
$password= "";
$database="users_db";

$conn= new mysqli($host,$user,$password,$database);

if($conn->connect_error) {
    die("Connection failed: ". $conn->connect_error );

}

/**
 * function to connect to the database
 * function connectDatabase() {
 * 
 * global $host, $user, $password, $database;
 * 
 * 
 * $conn = mysqli_connect($host, $user, $password, $database);
 * 
 * }
 * 
 * 
 * if(!$conn) {
 * 
 * echo mysqli_error($conn);
 * }else{
 * 
 * echo "Connected successfully";
 *} 
 * 
 * dbConnect();
 * 
 * 
 * 
 * 
 * 
 * 
 */


?>