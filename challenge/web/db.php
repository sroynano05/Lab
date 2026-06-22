<?php

$conn = new mysqli(
    "db",
    "root",
    "rootpassword",
    "pixelkart"
);

if ($conn->connect_error) {
    die("Connection failed");
}
?>