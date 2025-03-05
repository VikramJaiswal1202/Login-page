<?php
    session_start();
    if(isset($_SESSION["user_email"])){
        
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home page</title>
</head>
<body>
    <h1>This will be the homepage</h1>
    <?php
        echo $_SESSION["user_email"];
        echo $_SESSION["password"];
    ?>
</body>
</html>