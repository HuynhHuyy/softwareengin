<?php
  include('../../config/config.php');
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    } else {
        $id = '';
    }
    if(isset($_GET['id'])){
        $sql_delete = "DELETE FROM customer where customer_id= '$id'";
        if(mysqli_query($mysqli,$sql_delete)){
            header('Location:../../indexForStaff.php?content=CustomerManage&success=Xoá thành công');
        }
        else{
            header('Location:../../indexForStaff.php?content=CustomerManage&fail=Xoá thất bại');
        }
    } 
?>