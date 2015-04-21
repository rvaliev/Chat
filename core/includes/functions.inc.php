<?php





/**
 * If username isn't set, redirect to index.php
 */
if (!isset($_SESSION['username'])) {
    header("Location: /chat/index.php");
}


/**
 * Posting message
 */
if (isset($_POST['messageBtn']))
{
    $username = $_SESSION['username'];
    $message = $_POST['message'];
    $posts->insertMessage($username, $message);
    header("Refresh:0");
}

/**
 * Logging out
 */
if (isset($_GET['logout']))
{
    if ($_GET['logout'] == 1) {
        $_SESSION = array();
        $_SESSION['username'] = array();
        unset($_COOKIE[session_name()]);
        session_destroy();
        header("Refresh:0");
    }
}