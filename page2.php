<?php
session_start();
if(!isset($_SESSION['user'])) {
    header("Location: index.html");
}
$user = $_SESSION['user'];
?>

<html>
    <head>
        <title>Page 2</title> 
    </head>
<body>

<h1>This is page 2 </h1>
<p>Hello <?php echo $user;?>!</p>

<a href="post/postList_page.php">Post List</a> <br>
<a href="auth/signout.php">sign out</a>
</body>
</html>