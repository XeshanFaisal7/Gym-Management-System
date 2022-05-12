<?php

require_once('connection.php');
session_start();
$user_check = $_SESSION['login'];
// SQL Query To Fetch Complete Information Of User
$query = "SELECT * FROM `trainers` WHERE email='$user_check' OR `trainer_id`='$user_check'";
$result = mysqli_query($db, $query);
$row= mysqli_fetch_assoc($result);
?>