<?php
     require_once '../../config/config.php';
    if(isset($_POST["product_id"]) && !empty($_POST["product_id"])
    && isset($_COOKIE["UserToken"]) && !empty($_COOKIE["UserToken"])) {
     
        $ProductID = $_POST["product_id"];
        $Token = $_COOKIE["UserToken"];
        $query = "DELETE FROM cart WHERE Token = ? AND product_id= ?";
        $stmt = $mysqli->prepare($query);
        $stmt->bind_param("ss", $Token , $ProductID);
        $stmt->execute();
        $mysqli->close();
        header("Location: ../../indexforStaff.php?content=Bill");
    }
?>