<?php
      include('../../config/config.php');
    if (isset($_POST['add_warranty'])) {
        $customer_name = addslashes($_POST['customer_name']);
        $customer_phone = addslashes($_POST['customer_phone']);
        $customer_address = addslashes($_POST['customer_address']);
        $date_receive = addslashes($_POST['date_receive']);
        $date_return = addslashes($_POST['date_return']);
        $description = addslashes($_POST['description']);

    $sql = "SELECT * FROM warranty WHERE customer_phone = '$customer_phone'";
    $row = mysqli_query($mysqli,$sql);
    $count = mysqli_num_rows($row);
        if($count > 0){
            header("Location:../../indexForStaff.php?content=WarrantyManagement&fail=Đã có");
        }
        else{
            $sql_add = "INSERT INTO warranty (customer_name, customer_phone, customer_address, date_receive, date_return, description) VALUES ('$customer_name', '$customer_phone', '$customer_address','$date_receive','$date_return','$description')";
            mysqli_query($mysqli,$sql_add);
            header('Location:../../indexForStaff.php?content=WarrantyManagement&success=Thành công');
        }
    } 
?>