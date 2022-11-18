<?php 
    session_start(); // make sure we are closing the same session
    session_destroy(); 
    header("location:blog.php?userUniqueId=1"); // redirect to blog page of the 'main user'
    exit();
?>