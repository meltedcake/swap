
<?php

// destroy session and return to guest homepage
session_start();
session_destroy();
header("location:login.php");
