<?php
    require_once 'config/config.php';
    if(isset($_COOKIE["UserToken"]) && !empty($_COOKIE["UserToken"])) {
       
        $Token = $_COOKIE["UserToken"];
        $query = "SELECT DISTINCT product_id FROM cart WHERE Token = ?";
        $stmt = $mysqli->prepare($query);
        $stmt->bind_param("s", $Token);
        $stmt->execute();
        $result = $stmt->get_result();
        $Item = $result->num_rows;
    }else {
        $Item = 0;
    }
    
?>