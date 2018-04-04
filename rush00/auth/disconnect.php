<?php
session_start();
$_SESSION['logged_user'] = null;
$_SESSION['admin'] = null;
$_SESSION['return_msg'] = "<p>You just logged out.</p>";
header('Location: ..');
echo "Disconecting...";
?>``
