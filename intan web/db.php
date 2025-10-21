<?php
$hostname = "localhost";
$username = "tugaspabw_2414101071";
$password = "1_buahnaga";
$dbname = "tugaspabw_2414101071";

$conn = new mysqli($hostname, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}