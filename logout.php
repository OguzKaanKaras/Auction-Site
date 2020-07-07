<?php
session_start();
session_destroy();
setcookie("username", "", strtotime("-15 Days"));
setcookie("password", "", strtotime("-15 Days")); 
header("Refresh:1; url=index.php");			
?>