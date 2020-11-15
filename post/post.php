<?php require '../inc/conn.php' ?>
<?php
session_start();
if(!isset($_SESSION['user'])) {
    header("Location: ../index.html");
}

$title = $_POST['title'];
$author = $_SESSION['user'];
$content = $_POST["content"];

$sql = "INSERT INTO post (title, author, content)".
        "VALUES".
        "('$title', '$author', \"$content\");";
$insert = mysqli_query($conn, $sql);

if($insert) {
    header("Location: postList_page.php");
}
else {
    echo "post not successful.<br>";
    echo "<a href='postList_page.php'>back</a>";
}
?>