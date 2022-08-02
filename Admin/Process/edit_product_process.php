<?php
       include('../../config/config.php');

    if(isset($_POST['product_id'])){
        $product_id = $_POST['product_id'];

        $result_array = [];

        $sql = "SELECT * FROM product WHERE product_id = '$product_id'";
        $row = mysqli_query($mysqli,$sql);  

        if(mysqli_num_rows($row) > 0){ 
            foreach($row as $data_product){
                array_push($result_array, $data_product);
                header('Content-type: application/json');
                echo json_encode($result_array);
            }
        }
        else{
            echo $return ="Not Found";
        }
    }
    if(isset($_POST['edit_product'])){

        $id = $_POST['edit_id'];
        $product_name = $_POST['product_name'];
        $price = $_POST['price'];
        $img_product = $_FILES['img_product']['name'];
        $type_product = $_POST['type_product'];
        $info_product = $_POST['info_product'];
        $brand = $_POST['brand']; 
        $number_product = $_POST['number_product'];

    $sql = "UPDATE product SET product_name = '$product_name', price = '$price', img_product = '$img_product', type_product = '$type_product',info_product='$info_product',brand = '$brand',number_product = '$number_product' WHERE product_id ='$id'";
    if(mysqli_query($mysqli,$sql)){
        move_uploaded_file($_FILES["img_product"]["tmp_name"],"../../img/".$_FILES["img_product"]["name"]);
        header('Location:../../indexForAdmin.php?content=ProductManagement&success=Sửa thành công');
    }else{
        echo "sai r";
    }
}
?>