<?php require '../inc/conn.php' ?>
<?php
session_start();
if(!isset($_SESSION['user'])) {
    header("Location: ../index.html");
}
$user = $_SESSION['user'];

$sql = "select id, title, content, date from post where author='$user'";
$select = mysqli_query($conn, $sql);
?>

<html>
    <head> 
        <title>All My Posts</title> 
    </head>
    
    <body>
        <h2>This is All My Posts </h2>
        <p>Hello <?php echo "$user";?>!</p>

        <div>
            <table>
                <tr>
                    <td>Title</td>
                    <td>Content</td>
                    <td>Date</td>
                </tr>
                <?php
                while($row = mysqli_fetch_assoc($select)) {
                    echo "<tr>".
                        "<td>{$row['title']}</td>".
                        "<td>{$row['content']}</td>".
                        "<td>{$row['date']}</td>".
                        "<td>edit</td>".
                        "<td><form action='deletePost.php' method='post'>".
                        "<input type='hidden' name='id' value='{$row['id']}'>".
                        "<input type='submit' value='delete'>".
                        "</form></td>".
                        "</tr>";
                }
                ?>
            </table>
            <br>
            <br>
            <a href="postList_page.php">back</a>
        </div>
    </body>
</html>