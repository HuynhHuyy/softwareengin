<?php
          include('../../config/config.php');

    if(isset($_POST['staff_id'])){
        $staff_id = $_POST['staff_id'];

        $result_array = [];

        $sql = "SELECT * FROM staff WHERE staff_id = '$staff_id'";
        $row = mysqli_query($mysqli,$sql);  

        if(mysqli_num_rows($row) > 0){ 
            foreach($row as $data_staff){
                array_push($result_array, $data_staff);
                header('Content-type: application/json');
                echo json_encode($result_array);
            }
        }
        else{
            echo $return ="Not Found";
        }
    }
    if(isset($_POST['edit_staff'])){

        $id = $_POST['edit_id'];
        $staff_name = $_POST['staff_name'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $birthday = $_POST['birthday'];

    $sql = "UPDATE staff SET staff_name = '$staff_name', phone = '$phone', email = '$email', birthday = '$birthday'  WHERE staff_id ='$id'";
    if(mysqli_query($mysqli,$sql)){
        header('Location:../../indexForAdmin.php?content=StaffManagement&success=Sửa thành công');
    }else{
        echo "sai r";
    }
}
?>