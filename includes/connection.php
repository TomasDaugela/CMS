<?php
$hostname = "localhost";
$username = "root";
$password = "mysql";
$dbname = "cms";

// Create database

$conn = mysqli_connect($hostname, $username, $password);

$sql = "CREATE DATABASE cms";
if (mysqli_query($conn, $sql)) {
    echo "Database created successfully";
} 

mysqli_close($conn);

// Create connection
$conn = mysqli_connect($hostname, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// sql to create table
$sql = "CREATE TABLE articles (
id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
title VARCHAR(225) NOT NULL,
content TEXT(30) NOT NULL,
timestamp INT(11) NOT NULL

)";
if (mysqli_query($conn, $sql)) {
    echo "Table Articles created successfully";
} 


$sql = "CREATE TABLE users (
    user_id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_name VARCHAR(100) NOT NULL,
    user_password VARCHAR(100) NOT NULL
    )";
if (mysqli_query($conn, $sql)) {
    echo "Table users created successfully";
} 
mysqli_close($conn);



$pdo = new PDO("mysql:host=$hostName;dbname=$dbname",$username,$password);
?>