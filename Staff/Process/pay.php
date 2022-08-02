<?php
      include('../../config/config.php');
    if (isset($_POST['pay'])) {
        $product = addslashes($_POST['product']);
        $price = addslashes($_POST['price']);
        $address = addslashes($_POST['address']);
        $phone = addslashes($_POST['phone']);
        $name = addslashes($_POST['name']);
        $bank = addslashes($_POST['bank']);
    } else {
        $product = '';
        $price = '';
        $address = '';
        $phone = '';
        $name = '';
        $bank = '';
    }
    //check customer
    $sql = "SELECT * FROM customer WHERE phone = '$phone'";
    $row = mysqli_query($mysqli,$sql);
    $count = mysqli_num_rows($row);
    if($count == 0){
        $sql_add_customer = "INSERT INTO customer (customer_name, phone, address) VALUES ('$name', '$phone', '$address')";
        mysqli_query($mysqli,$sql_add_customer);
    }
    if(isset($_POST['pay'])){
        $sql_add = "INSERT INTO bill (list_item, price, customer_name, phone, address, type_bill) VALUES ('$product','$price','$name','$phone','$address', 'Tại quầy')";
        mysqli_query($mysqli,$sql_add);
        $sql_new_cart = "DELETE FROM cart";
        mysqli_query($mysqli,$sql_new_cart);
        header('Location:../../indexforStaff.php?content=Bill&success=Thanh toán thành công');
    } 
?>