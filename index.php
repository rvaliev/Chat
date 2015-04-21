<?php

session_start();
require_once("core/classes/posts.class.php");

$posts = new Posts();


?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="UTF-8">
    <title>Welcome to chat</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<div class="wrapper2">
    <h1>Enter your username</h1>
    <form class="loginForm" action="index.php" method="post">
        <input type="text" name="username" placeholder="Enter user name"/>
        <br>
        <br>
        <input type="submit" name="userBtn" value="Start Chat"/>
    </form>
    <?php
    if (isset($_SESSION['message']))
    {
        echo "<h4>" . $_SESSION['message'] . "<h4>";
    }
    ?>
</div>
</body>
</html>

<?php
if (isset($_POST['userBtn']))
{
    if (empty($_POST['username']))
    {
        $_SESSION['message'] = "Username is required";
        header("Refresh:0");
    }
    else
    {
        $allPosts = $posts->userCheck($_POST['username']);
        if ($allPosts[0]['count'] != 0) {
            $_SESSION['message'] = "Username already exists";
            header("Refresh:0");
        }
        else
        {
            $_SESSION['message'] = "";
            $_SESSION['username'] = $_POST['username'];
        }
    }


}

if(isset($_SESSION['username']))
{
    header("Location: chat.php");
}




?>