<?php
       include('../../config/config.php');

    if(isset($_POST['bill_id'])){
        $bill_id = $_POST['bill_id'];

        $result_array = [];

        $sql = "SELECT * FROM bill WHERE bill_id = '$bill_id'";
        $row = mysqli_query($mysqli,$sql);  

        if(mysqli_num_rows($row) > 0){ 
            foreach($row as $data_bill){
                array_push($result_array, $data_bill);
                header('Content-type: application/json');
                echo json_encode($result_array);
            }
        }
        else{
            echo $return ="Not Found";
        }
    }
    if(isset($_POST['edit_bill'])){

        $id = $_POST['edit_id'];
        $customer_name = $_POST['customer_name'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $list_item = $_POST['list_item'];
        $price = $_POST['price'];

    $sql = "UPDATE bill SET customer_name = '$customer_name', phone = '$phone', address = '$address', list_item = '$list_item', price='$price' WHERE bill_id ='$id'";
    if(mysqli_query($mysqli,$sql)){
        header('Location:../../indexforStaff.php?content=BillManagement&success=Sửa thành công');
    }else{
        header('Location:../../indexforStaff.php?content=BillManagement&fail=Sửa thất bại');
    }
}
?>