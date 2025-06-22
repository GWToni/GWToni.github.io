<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "printaj";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Greška pri spajanju na bazu: " . $conn->connect_error);
}
?>