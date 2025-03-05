<?php
    //$sql="INSERT INTO `login_page`(`id`, `user_email`, `password`) VALUES (NULL,'$new_User_Email','$new_User_Password')";
    include("dbconn.php");
    if (isset($_POST["sign_up"])) {
        $new_User_Email=$_POST["user_email"];
        $new_User_Password=$_POST["user_password"];
        $confirm_Password=$_POST["confirm_password"];
        

        if (empty($new_User_Email) ||empty($new_User_Password) ||empty($confirm_Password)) {
            header("Location: Sign_up.php?msg= Empty Input Fields ");
        }
        else if ($new_User_Password!=$confirm_Password) {
            header("Location: Sign_up.php?msg= Passwords Dont Match ");
        }else {
            $sql="INSERT INTO `login_page`(`id`, `user_email`, `password`) VALUES (NULL,'$new_User_Email','$new_User_Password')";
            $result=mysqli_query($conn,$sql);
            if ($result) {
                header("Location: Sign_up.php?msg=New User Entered successfully");
            }else{
                echo "Failed :". mysqli_error($conn);
            }   
        }       
        
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign-in Page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="sign_up.css">
</head>
<body>
    <div class="form_box">
        <div class="img_box">
        <i class="fa-regular fa-user fa-2xl" style="color: #2898c4;"></i>
        </div>
        <div class="form_area">
        <form method="post" action="Sign_up.php">

        <?php 
        if(isset($_GET["msg"]))
        {
            echo $_GET["msg"];
        }
        ?>
            <div class="mb-3">
               
                <input type="email" name="user_email" id="user_email" placeholder="Enter New Email" aria-describedby="emailHelp">
            </div>    
            <div class="mb-3">
                <input type="password" name="user_password" id="exampleInputPassword1" placeholder="Password">
            </div>
            <div class="mb-3">
                <input type="password" name="confirm_password" id="exampleInputPassword1" placeholder="Confirm Password">
            </div>
            <div class="att">
                <a href="Sign_in.php" class="fg_password">Already A User?</a>
            </div>
            
            <button type="submit" name="sign_up" class="input_button">Sign Up</button>
        </form>
        </div>
        
    </div>
</body>
</html>