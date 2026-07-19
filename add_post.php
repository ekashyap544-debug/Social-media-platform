<?php
include 'config.php';
$user_id = 1;
$content = $_POST['content'];
mysqli_query($conn, "INSERT INTO posts(user_id, content) VALUES($user_id,'$content')");
header("Location: social.php");
?>
