<?php
    require_once 'config/config.php';
  
    $query = "SELECT * FROM cart WHERE Token = ? ";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("s", $_COOKIE["UserToken"]);
    $stmt->execute();
    $result = $stmt->get_result();
    $TotalPrice = 0;
    $id = 0;
    $arr = '';
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $query = "SELECT * FROM product WHERE product_id = ? ";
            $stmt = $mysqli->prepare($query);
            $stmt->bind_param("s", $row["product_id"]);
            $stmt->execute();
            $resultProduct = $stmt->get_result();
            $rowProduct = $resultProduct->fetch_assoc();
            $TotalPrice += $rowProduct["price"] * $row["number_product"];
            $arr = $arr.$rowProduct["product_name"].',';
            
            require 'Client/Dialog/DialogDeleteItemCart.php';
            require 'Client/Dialog/DialogUpdateItemCart.php';
    ?>
            <tr class = "text-center">
                <td style="width: 20%;">
                    <div style="text-align: left; margin-left:8px">
                        <p><?php echo $rowProduct["product_name"] ?></p>
                    </div>
                </td>
                <td><?php echo $row["number_product"] ?></td>
                <td><?php echo number_format($row["number_product"] * $rowProduct["price"], 0, '',',') ?> VND</td>
                <td><a href="#DeleteItem<?php echo $id ?>" data-toggle="modal">Xóa</a> | <a data-toggle="modal" href="#UpdateItem<?php echo $id?>">Cập Nhật</a></td>
            </tr>
    <?php $id++; }
} ?>