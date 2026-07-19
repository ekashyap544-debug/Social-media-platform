<?php include 'config.php'; $id = $_GET['id'];?>
<h1>User Profile</h1>
<?php
$user = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM users WHERE id=$id"));
echo "<h2>".$user['name']." @".$user['username']."</h2>";
echo "<a href='follow.php?to=$id'>Follow</a><hr>";
echo "<h3>Posts:</h3>";
$posts = mysqli_query($conn, "SELECT * FROM posts WHERE user_id=$id");
while($p = mysqli_fetch_assoc($posts)) echo "<p>".$p['content']."</p>";
?>
