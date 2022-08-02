<?php  
    if(!isset($_COOKIE["UserToken"]) || empty($_COOKIE["UserToken"])) { 
        $Token = md5(rand(0,9999));
        setcookie("UserToken" , $Token , time() + (86400 * 30) , "/" , false);
    }
?>