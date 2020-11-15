<?php require '../inc/conn.php' ?>
<?php
session_start();
if(isset($_SESSION['user'])) {
    unset($_SESSION['user']);
}

$username = $_POST['username'];
$password = hash('sha512', $_POST['password']);

$sql = "select * from myblog where username='$username'";
$query = mysqli_query($conn, $sql);
if(mysqli_num_rows($query) != 0) {
    echo "user already exist, use another name. <br>";
    echo "<a href='signup.html'>back</a>";
    die();
}

$sql = "INSERT INTO myblog (username, password)".
        "VALUES ".
        "('$username', '$password');";
$insert = mysqli_query($conn, $sql);
if($insert) {
    echo "<h1>Sign up successful.</h1> <br>";
    echo "back to <a href='login.html'>log in</a> page";
}
else {
    echo "<h1>Sign up not successful.</h1> <br>";
    echo "back to <a href='../index.html'>frontpage </a>";
}
?>