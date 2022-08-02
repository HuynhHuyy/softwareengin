<?php
 include('../../config/config.php');
    if (isset($_POST['create'])) {
        $name = addslashes($_POST['name']);
        $phone = addslashes($_POST['phone']);
        $address = addslashes($_POST['address']);
      

    $sql = "SELECT * FROM customer WHERE phone = '$phone'";
    $row = mysqli_query($mysqli,$sql);
    $count = mysqli_num_rows($row);
        if($count > 0){
            header("Location:../../indexForStaff.php?content=CustomerManagement&fail=Đã có");
        }
        else{
            $sql_add = "INSERT INTO customer (customer_name, phone, address) VALUES ('$name', '$phone', '$address')";
            mysqli_query($mysqli,$sql_add);
            header('Location:../../indexForStaff.php?content=CustomerManagement&success=Thành công');
        }
    } 
?>