<?php
    session_start(); // to make sure we are using the same session
    $userUniqueId = $_SESSION['userUniqueId'];
    if($userUniqueId === null){
        echo "

         Please login first! 
      
        ";
    }

    $inputTitle = $_POST['blogTitle']; // title from the form in authorized.php
    $inputBlogBody = $_POST['blogBody']; // body of blog from the form in authorized.php

    date_default_timezone_set("Europe/London"); // set default time to UK
    $dateNtime = date("Y-m-d")." ".date("H:i:s"); // create current time in database format

    $servername = "127.0.0.1";
    $username = "root";
    $password = "";
    $dbname = "ecs417";

    // Creates connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Checks connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $sql = "INSERT INTO blogposts$userUniqueId (title, blogBody, dateNtime) VALUES ('$inputTitle', '$inputBlogBody', '$dateNtime')";
    if ($conn->query($sql) === TRUE) // if data is inserted to database the session is ended and the user is logged out. Then, the blogs of corresponding user is apeared.
    {
        $conn->close(); // close connection
        session_destroy();
        header("Location: blog.php?userUniqueId=$userUniqueId"); // blog page of 'corresponding user'
        exit();
    } 
    else 
    {
        $conn->close();
        echo "Error: " . $sql . "<br>" . $conn->error; // print error type if data is not successfuly inserted
    }
    $conn->close();
    }
?>