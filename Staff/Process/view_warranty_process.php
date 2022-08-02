<?php
      include('../../config/config.php');
    if(isset($_POST['warranty_id'])){
        $customer_id = $_POST['warranty_id'];

        $sql = "SELECT * FROM warranty WHERE customer_id = '$customer_id'";
        $row = mysqli_query($mysqli,$sql);    

        if(mysqli_num_rows($row) > 0){
            foreach($row as $data_warranty){
                echo $return = '
                <table class="table">
                   
                    <tr>
                        <td> Tên khách hàng:</td> 
                        <td>'.$data_warranty['customer_name'].'</td>
                    </tr>
                    <tr>
                        <td> Số điện thoại khách hàng: </td> 
                        <td>'.$data_warranty['customer_phone'].'</td>
                    </tr>
                    <tr>
                        <td> Địa chỉ: </td> 
                        <td>'.$data_warranty['customer_address'].'</td>
                    </tr>

                    <tr>
                        <td> Ngày nhận bảo hành sản phẩm: </td> 
                        <td>'.$data_warranty['date_receive'].'</td>
                    </tr>
                    <tr>
                        <td> Ngày dự kiến trả sản phẩm: </td> 
                        <td>'.$data_warranty['date_return'].'</td>
                    </tr>
                    <tr>
                    <td> Mô tả tình trạng: </td> 
                    <td>'.$data_warranty['description'].'</td>
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