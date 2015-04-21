<?php

session_start();
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
        echo $_SESSION['message'];
    }
    ?>
    <h4>This username already exists</h4>
</div>
</body>
</html>

<?php
if (isset($_POST['userBtn'])) {
    $_SESSION['username'] = $_POST['username'];
}

if(isset($_SESSION['username']))
{
    header("Location: chat.php");
}

?>