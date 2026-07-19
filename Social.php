<?php include 'config.php'; $user_id = 1; // demo login?>

<h1>📱 CodeAlpha Social</h1>
<a href="profile.php?id=1">My Profile</a>
<hr>

<!-- POST BOX -->
<form method="POST" action="add_post.php">
  <textarea name="content" placeholder="What's on your mind?" rows="3" cols="50" required></textarea><br>
  <input type="submit" value="Post">
</form><hr>

<!-- ALL POSTS -->
<?php
$result = mysqli_query($conn, "SELECT p.*, u.name FROM posts p JOIN users u ON p.user_id=u.id ORDER BY p.id DESC");
while($post = mysqli_fetch_assoc($result)){
  echo "<div style='border:1px solid #ccc; padding:10px; margin:10px;'>";
  echo "<b>".$post['name']."</b> <small>".$post['created_at']."</small><br>";
  echo "<p>".$post['content']."</p>";

  // Like Button
  echo "<a href='like.php?post=".$post['id']."'>❤️ Like</a> ";

  // Comments
  $c = mysqli_query($conn, "SELECT * FROM comments WHERE post_id=".$post['id']);
  while($com = mysqli_fetch_assoc($c)){
    echo "<p>- ".$com['comment']."</p>";
  }

  echo "<form method='POST' action='add_comment.php'>
        <input type='hidden' name='post_id' value='".$post['id']."'>
        <input type='text' name='comment' placeholder='Write comment'>
        <input type='submit' value='Comment'>
        </form>";

  echo "</div>";
}
?>
