<?php
       require_once '../../config/config.php';
        $ProductID = $_POST["product_id"];
        $Quantity = $_POST["number_product"];
        $query = "UPDATE cart SET number_product = ? WHERE product_id = ?";
        $stmt = $mysqli->prepare($query);
        $stmt->bind_param("is", $Quantity ,$ProductID );
        $stmt->execute();
        $mysqli->close();
        header("Location: ../../indexForStaff.php?content=Bill");
?>
