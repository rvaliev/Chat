<?php
session_start();

require_once("core/classes/posts.class.php");

$posts = new Posts();
$allPosts = $posts->getMessages();

require_once("core/includes/functions.inc.php");
?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="UTF-8">
    <title>Chatroom</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<div class="wrapper">

    <h1>Chatroom</h1>

    <?php
    foreach ($allPosts as $post)
    {
    ?>
    <ul>
        <li><?= $post['username'];?></li>
        <li><?= $post['postdate'];?></li>
        <li><?= $post['post'];?></li>
    </ul>
    <hr>

    <?php
    }
    ?>

    <div class="bottomSpace">

    </div>

</div>

<div class="chatwrapper">
    <form class="chat" action="chat.php" method="post">
        <input class="message" type="text" name="message" placeholder="Enter the message"/>
        <br><br>
        <input type="submit" name="messageBtn" value="Send message"/>
        <a class="logout" href="chat.php?logout=1">Logout</a>
    </form>

</div>

</body>
</html>
