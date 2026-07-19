<?php
include 'config.php';
$user_id = 1;
mysqli_query($conn, "INSERT INTO likes(post_id, user_id) VALUES($_GET[post],$user_id)");
header("Location: social.php");
?>
