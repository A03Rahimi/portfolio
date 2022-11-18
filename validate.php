<?php
    session_start();
    $servername = "127.0.0.1";
    $username = "root";
    $password = "";
    $dbname = "portfoliodb";

    $userName = $_POST['email'];
    $userPassword = $_POST['password'];

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    // Check connection
    if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
    }

    $sql = ("SELECT * FROM `users` WHERE email = '" . $userName . "'" );
    $result = mysqli_query($conn, $sql);

    // if there is exactly one user with given email 
    if (mysqli_num_rows($result) == 1) 
    {
        $row = mysqli_fetch_assoc($result); // get records from database
        $realPassword = $row['password'];
        mysqli_close($conn);
        
        if ($realPassword === $userPassword) // successful login
        {
            $_SESSION['userFirstName'] = $row['firstName'];
            $_SESSION['userUniqueId'] = $row['ID'];
            header("Location: authorized.php");
            exit();
        } 
        else // incorrect password
        {
            session_destroy();
            header("Location: login.php");
            exit();
        }

    } 
    else // incorrect or duplicate email
    {
        session_destroy();
        header("Location: login.php");
        exit();
    }
?>