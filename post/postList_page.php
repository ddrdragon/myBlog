<?php require '../inc/conn.php' ?>
<?php
session_start();
if(!isset($_SESSION['user'])) {
    header("Location: ../index.html");
}
$user = $_SESSION['user'];

$sql = "select title, author, content, date from post";
$query = mysqli_query($conn, $sql);
?>

<html>
    <head> 
        <title>Post List</title> 
    </head>
    
    
    <body>
        <h1>This is Post List </h1>
        <p>Hello <?php echo $user;?>!</p>
        
        <?php if($_SESSION['user'] === 'Xiaotong'): ?>
            <p>Your are the admin!!!</p>
        <?php else: ?>
            <p>Your are not admin...</p>
        <?php endif ?>

        <div>
            <h2>Post List</h2>
            <table>
                <tr>
                    <td>Title</td>
                    <td>Author</td>
                    <td>Content</td>
                    <td>Date</td>
                </tr>
                <?php
                while($row = mysqli_fetch_assoc($query)) {
                    echo "<tr>".
                        "<td>{$row['title']}</td>".
                        "<td>{$row['author']}</td>" .
                        "<td>{$row['content']}</td>".
                        "<td>{$row['date']}</td>".
                        "</tr>";
                }
                ?>
            </table>
            <p><a href="allMyPosts.php">check all your posts.</a></p>
        </div>

        <div>
            <h2>Make your post</h2>
            <form action="post.php" method="POST">
                Title: <input type="text" name="title" required="required"> <br>
                Content: <input type="text" name="content"> <br>
                <input type="submit" value="post">
            </form>
        </div>


        <a href="../page2.php">page2</a> <br>
        <a href="../auth/signout.php">sign out</a> <br>

    </body>
</html>