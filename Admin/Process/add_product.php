<?php
      include('../../config/config.php');
    if (isset($_POST['create'])) {
        $product_name = addslashes($_POST['product_name']);
        $product_id = addslashes($_POST['product_id']);
        $brand = addslashes($_POST['brand']);
        $type = addslashes($_POST['type']);
        $price = addslashes($_POST['price']);
        $info_product = addslashes($_POST['info_product']);
        $number = addslashes($_POST['number']);
    } else {
        $product_name = '';
        $product_id = '';
        $brand = '';
        $type = '';
        $price = 0;
        $info_product = '';
        $number = 0;
    }
    $sql = "SELECT * FROM product WHERE product_id = '$product_id'";
    $row = mysqli_query($mysqli,$sql);
    $count = mysqli_num_rows($row);
    $img_product = $_FILES['img_product']['name'];
    if(isset($_POST['create'])){
        if($count > 0){
            header("Location:../../indexForAdmin.php?content=ProductManagement&fail=Đã có");
        }
        else{
            
            move_uploaded_file($_FILES["img_product"]["tmp_name"],"../../img/".$_FILES["img_product"]["name"]);
            $sql_add = "INSERT INTO product (product_id, product_name, price, type_product, info_product, brand,img_product, number_product) VALUES ('$product_id', '$product_name', '$price','$type','$info_product','$brand','$img_product', '$number')";
            mysqli_query($mysqli,$sql_add);
            header('Location:../../indexForAdmin.php?content=ProductManagement&success=Thành công');
        }
    } 
?>