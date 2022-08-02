<?php
    $mysqli = new mysqli("localhost","root","","manage");
    // Check connection
    $mysqli->set_charset("utf8");
    if ($mysqli->connect_error) {
        die('Không thể kết nối database: ' . $mysqli->connect_error);
    }  
?>