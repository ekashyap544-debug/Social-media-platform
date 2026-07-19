<?php
include 'config.php';
$user_id = 1;
mysqli_query($conn, "INSERT INTO comments(post_id, user_id, comment) VALUES($_POST[post_id],$user_id,'$_POST[comment]')");
header("Location: social.php");
?>
