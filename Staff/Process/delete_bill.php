<?php
  include('../../config/config.php');
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    } else {
        $id = '';
    }
    if(isset($_GET['id'])){
        $sql_delete = "DELETE FROM bill where bill_id= '$id'";
        if(mysqli_query($mysqli,$sql_delete)){
            header('Location:../../indexforStaff.php?content=BillManagement&success=Xoá thành công');
        }
        else{
            header('Location:../../indexforStaff.php?content=BillManagement&fail=Xoá thất bại');
        }
    } 
?>