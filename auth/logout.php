<?php
session_start();
require_once '../config/auth.php';

signOut();

header('Location: signin.php');
exit;
?>
