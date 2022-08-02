<?php
       include('../../config/config.php');

    if(isset($_POST['customer_id'])){
        $customer_id = $_POST['customer_id'];

        $result_array = [];

        $sql = "SELECT * FROM customer WHERE customer_id = '$customer_id'";
        $row = mysqli_query($mysqli,$sql);  

        if(mysqli_num_rows($row) > 0){ 
            foreach($row as $data_customer){
                array_push($result_array, $data_customer);
                header('Content-type: application/json');
                echo json_encode($result_array);
            }
        }
        else{
            echo $return ="Not Found";
        }
    }
    if(isset($_POST['edit_customer'])){

        $id = $_POST['edit_id'];
        $customer_name = $_POST['name_customer'];
        $phone = $_POST['phone_customer'];
        $address = $_POST['address_customer'];

    $sql = "UPDATE customer SET customer_name = '$customer_name', phone = '$phone', address = '$address' WHERE customer_id ='$id'";
    if(mysqli_query($mysqli,$sql)){
        header('Location:../../indexForStaff.php?content=CustomerManagement&success=Sửa thành công');
    }else{
        header('Location:../../indexForStaff.php?content=CustomerManagement&fail=Sửa thất bại');
    }
}
?>