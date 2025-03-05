<?php
    
    include("dbconn.php");
    if (isset($_POST["sign_in"])) {
        $existing_user = $_POST["user_email"];
        $existing_password = $_POST["user_password"];
    
        $sql = "SELECT `user_email`, `password` FROM `login_page` WHERE user_email = ? AND password = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $existing_user, $existing_password);
        $stmt->execute();
        $result = $stmt->get_result();
    
        if ($result) {
            $row = $result->fetch_assoc();
            if ($row && $row["user_email"] == $existing_user && $row["password"] == $existing_password) {
                session_start();
                $_SESSION["user_email"] = $row["user_email"];
                $_SESSION["password"] = $row["password"];
                header("Location: http://localhost/website/Modal/index.php");
                exit;
            }
        }
    }else {
        
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign-in Page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="sign_in.css">
</head>
<body>
    
    <div class="form_box">
        <div class="img_box">
        <i class="fa-regular fa-user fa-2xl" style="color: #2898c4;"></i>
        </div>
        <div class="form_area">
        <form method="POST" action="Sign_in.php">
            <div class="mb-3">
                <input type="email" name="user_email" id="user_email" placeholder="Email" aria-describedby="emailHelp">
            </div>    
            <div class="mb-3">
                <input type="password" name="user_password"  placeholder="Password">
            </div>
            <div class="att">
                <a href="" class="fg_password">Forgot password?</a>
            </div>
            <br>
            
            <button type="submit" name="sign_in" class="input_button">Sign In</button>
            <br>
            
            
        </form>
        <a href="Sign_up.php"><button class="input_button" >Sign Up</button></a>
        </div>
        
    </div>
</body>
</html>