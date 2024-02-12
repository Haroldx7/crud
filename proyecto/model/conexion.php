<?php 
$conn = new mysqli("localhost","root","","ejemplo");
if ($conn->connect_error) {
    die("". $conn->connect_error);
}