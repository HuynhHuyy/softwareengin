<?php
          include('../../config/config.php');
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    } else {
        $id = '';
    }
    if(isset($_GET['id'])){
        $sql_delete = "DELETE FROM product where product_id = '$id'";
        if(mysqli_query($mysqli,$sql_delete)){
            header('Location:../..//indexForAdmin.php?content=ProductManagement&success=Xoá thành công');
        }
        else{
            echo 'fail';
        }
    } 
?>