<?php
session_start();

//remove all the session we set for the login purpose
$_SESSION['user_id'] = '';
$_SESSION['email'] = '';
$_SESSION['name'] = '';
session_destroy();

header("location:index.php");
exit;
