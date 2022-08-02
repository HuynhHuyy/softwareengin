<?php
         include('../../config/config.php');
    if (isset($_POST['create_bill'])) {
        $customer_name = addslashes($_POST['bill_name']);
        $phone = addslashes($_POST['bill_phone']);
        $address = addslashes($_POST['bill_address']);
        $price = addslashes($_POST['bill_price']);
        $list_item = addslashes($_POST['bill_item']);
   
        $sql = "SELECT * FROM bill WHERE phone = '$phone'";
        $row = mysqli_query($mysqli,$sql);
        $count = mysqli_num_rows($row);


        $sql_add = "INSERT INTO bill (list_item, price, customer_name, phone, address) VALUES ('$list_item', '$price', '$customer_name','$phone','$address')";
        mysqli_query($mysqli,$sql_add);
        header('Location:../../indexforStaff.php?content=BillManagement&success=Thành công');
    }
  
?>