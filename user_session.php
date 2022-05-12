<?php

require_once('connection.php');
session_start();
$user_check = $_SESSION['login'];
// SQL Query To Fetch Complete Information Of User
$query = "SELECT * FROM `joiners` WHERE email='$user_check' OR joiner_id='$user_check'";
$result = mysqli_query($db, $query);
$roww = mysqli_fetch_assoc($result);
?>