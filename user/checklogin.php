
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>

<?php

/* 
 * Program: Db access Code
 * Author: Tyrone Russ
 * Description: Verify username and password exist in db
 * Last modified: 9/3/2017
 */
    if ('$_POST') {   
        session_start();
 
        $users_username = $_POST['username'];
        $users_password = $_POST['password'];
        
        $user_found = 0;
        
        $handle = fopen("user.txt", "r");                                
        
        if ($handle) {
            while (($line = fgets($handle)) !== false) {
                $list = explode("|", $line);
                $username = $list[2];
                $password = $list[3];
               // echo 'File: ' . $list[2] . ' ' . $list[3] . '<br>'; 
               // echo 'Login: ' . $users_username . ' ' . $users_password . '<br>'; 

                if (($list[2] == $users_username) and ($list[3] == $users_password)){
                    $user_found = 1;  
                   //  echo $user_found;
                   //  echo 'Username: ' . $list[2] . ' ';
                   // echo 'Password: ' . $list[3] . '<br>';
                }
            }
        }
        if ($user_found != 0) {
            fclose($handle);
            header('Location: ../mailer/fcsources.php'); 
        } else {
            fclose($handle);
            header('Location: login.php?message=Password or Username is invalid, please try again...'); 
        }
             /* close connection */
    }
  ?>
  </body>
</html>
 