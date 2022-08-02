<?php
       include('../../config/config.php');

    if(isset($_POST['warranty_id'])){
        $warranty_id = $_POST['warranty_id'];

        $result_array = [];

        $sql = "SELECT * FROM warranty WHERE customer_id = '$warranty_id'";
        $row = mysqli_query($mysqli,$sql);  

        if(mysqli_num_rows($row) > 0){ 
            foreach($row as $data_warranty){
                array_push($result_array, $data_warranty);
                header('Content-type: application/json');
                echo json_encode($result_array);
            }
        }
        else{
            echo $return ="Not Found";
        }
    }
    if(isset($_POST['edit_warranty'])){

        $id = $_POST['edit_id'];
        $customer_name = $_POST['customer_name'];
        $customer_phone = $_POST['customer_phone'];
        $customer_address = $_POST['customer_address'];
        $date_receive = $_POST['date_receive'];
        $date_return = $_POST['date_return'];
        $description = $_POST['description']; 

    $sql = "UPDATE warranty SET customer_name = '$customer_name', customer_phone = '$customer_phone', customer_address = '$customer_address', date_receive = '$date_receive',date_return='$date_return',description = '$description' WHERE customer_id ='$id'";
    if(mysqli_query($mysqli,$sql)){
        header('Location:../../indexForStaff.php?content=WarrantyManagement&success=Sửa thành công');
    }else{
        header('Location:../../indexForStaff.php?content=WarrantyManagement&fail=Sửa thất bại');
    }
}
?>