<?php
      include('../../config/config.php');
    if(isset($_POST['bill_id'])){
        $bill_id = $_POST['bill_id'];

        $sql = "SELECT * FROM bill WHERE bill_id = '$bill_id'";
        $row = mysqli_query($mysqli,$sql);    

        if(mysqli_num_rows($row) > 0){
            foreach($row as $data_bill){
                echo $return = '
                <table class="table">
                   
                    <tr>
                        <td> Tên khách hàng:</td> 
                        <td>'.$data_bill['customer_name'].'</td>
                    </tr>
                    <tr>
                        <td> Số điện thoại khách hàng: </td> 
                        <td>'.$data_bill['phone'].'</td>
                    </tr>
                    <tr>
                        <td> Địa chỉ: </td> 
                        <td>'.$data_bill['address'].'</td>
                    </tr>

                    <tr>
                        <td> Sản phẩm đã mua: </td> 
                        <td>'.$data_bill['list_item'].'</td>
                    </tr>
                    <tr>
                        <td> Tổng số tiền: </td> 
                        <td>'.$data_bill['price'].'</td>
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