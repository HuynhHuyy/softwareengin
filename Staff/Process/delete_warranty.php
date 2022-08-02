<?php
  include('../../config/config.php');
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    
        $sql_delete = "DELETE FROM warranty WHERE customer_id= '$id'";
        if(mysqli_query($mysqli,$sql_delete)){
            header('Location:../../indexForStaff.php?content=WarrantyManagement&success=Xoá thành công');
        }
        else{
            header('Location:../../indexForStaff.php?content=WarrantyManagement&fail=Thất bại');
        }
    } 
?>