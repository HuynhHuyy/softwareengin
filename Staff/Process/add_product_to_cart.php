<?php
    require_once '../../config/config.php';
    if(isset($_COOKIE["UserToken"]) && !empty($_COOKIE["UserToken"])
    && isset($_POST["product_id"]) && !empty($_POST["product_id"]))
     {
        $Token = $_COOKIE["UserToken"];
        $ProductID = $_POST["product_id"];
        $query = "SELECT * FROM cart WHERE Token = ? AND product_id = ?";
        $stmt = $mysqli->prepare($query);
        $stmt->bind_param("ss", $Token , $ProductID);
        $stmt->execute();
        $result = $stmt->get_result();
        if($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $Quantity = $row["number_product"] + 1;
            $query = "UPDATE cart SET number_product = ? WHERE Token = ? AND product_id= ?";
            $stmt = $mysqli->prepare($query);
            $stmt->bind_param("iss", $Quantity , $Token , $ProductID);
            $stmt->execute();
        }else {
            $query = "INSERT cart(Token , product_id) VALUES(? , ?)";
            $stmt = $mysqli->prepare($query);
            $stmt->bind_param("ss", $Token , $ProductID);
            $stmt->execute();
        }
        $mysqli->close();
        header("Location:../../indexforStaff.php?content=Product");
      
    }
?>