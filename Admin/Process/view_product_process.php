<?php
      include('../../config/config.php');
    if(isset($_POST['product_id'])){
        $product_id = $_POST['product_id'];

        // echo $return = $d_name;

        $sql = "SELECT * FROM product WHERE product_id = '$product_id'";
        $row = mysqli_query($mysqli,$sql);    

        if(mysqli_num_rows($row) > 0){
            foreach($row as $data_product){
                echo $return = '
                <table class="table">
                   
                    <tr>
                        <td> Tên sản phẩm:</td> 
                        <td>'.$data_product['product_name'].'</td>
                    </tr>
                    <tr>
                        <td> Giá tiền: </td> 
                        <td>'.$data_product['price'].'</td>
                    </tr>
                    <tr>
                        <td> Loại sản phẩm: </td> 
                        <td>'.$data_product['type_product'].'</td>
                    </tr>

                    <tr>
                        <td> Thông tin sản phẩm: </td> 
                        <td>'.$data_product['info_product'].'</td>
                    </tr>
                    <tr>
                        <td> Thương hiệu: </td> 
                        <td>'.$data_product['brand'].'</td>
                    </tr>
                    <tr>
                    <td> Số lượng còn trong kho: </td> 
                    <td>'.$data_product['number_product'].'</td>
                </tr>
                </table>
                ';
            }
        }
        else{
            echo $return ="<h5> Not Found</h5>";
        }
    }
?>