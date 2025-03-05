<?php
     // Database Connection 
     $db_server_name="localhost";
     $db_user="root";
     $db_password="";
     $db_name="practice";
 
 
     try {
         
     $conn=mysqli_connect($db_server_name,
                         $db_user,
                         $db_password,
                         $db_name);
         
 
     } catch (mysqli_sql_exception) {
         print"couldnt connect to the database";
     }

?>