<?php
session_start();
session_destroy();
header("location:adminLoginPage.php?msg=Logged out successfully.");
?>