<?php

    /* Function to check password Format */
        function checkPassFormat($pass){
            if (strlen($pass) <= '8') {
                $passErr = "Your pass Must Contain At Least 8 Characters!";
                return $passErr;
            }

            elseif(!preg_match("#[0-9]+#",$pass)) {
                $passErr = "Your pass Must Contain At Least 1 Number!";
                return $passErr;
            }

            elseif(!preg_match("#[A-Z]+#",$pass)) {
                $passErr = "Your pass Must Contain At Least 1 Capital Letter!";
                return $passErr;
            }

            elseif(!preg_match("#[a-z]+#",$pass)) {
                $passErr = "Your pass Must Contain At Least 1 Lowercase Letter!";
                return $passErr;
            }

            return;
        }
    /**/

    /* Function to Check Password with hash password in DB */
        function checkPassword($pass, $hash){
            if (password_verify($pass, $hash)) {
                return true;
            }
            
            else {
                return false;
            }
        }
    /**/

    /* Function to Test if there are enought place for activity */    
        function checkifenoughplace(){
            include('read.php');

            $TAA = TakeAllActivity();

            var_dump($TAA);
        }
    /**/
?>
