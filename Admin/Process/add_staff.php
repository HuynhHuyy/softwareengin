<?php
         include('../../config/config.php');
    if (isset($_POST['create'])) {
        $name = addslashes($_POST['name']);
        $phone = addslashes($_POST['phone']);
        $birthday = addslashes($_POST['birthday']);
        $email = addslashes($_POST['email']);
        $level = addslashes($_POST['level']);
    } else {
        $name = '';
        $fullname = '';
        $birthday = '';
        $phone = '';
        $email = '';
        $level = '';
    }
    
    $sql = "SELECT * FROM staff WHERE phone = '$phone'";
    $row = mysqli_query($mysqli,$sql);
    $count = mysqli_num_rows($row);
    if(isset($_POST['create'])){
        if($count > 0){
            header("Location:../../indexforAdmin.php?content=StaffManagement&fail=Đã có");
        }
        else{
            $password = $phone;
            $sql_add = "INSERT INTO staff (staff_name, phone, birthday, email, password, level) VALUES ('$name', '$phone', '$birthday','$email','$password','$level')";
            mysqli_query($mysqli,$sql_add);
            header('Location:../../indexforAdmin.php?content=StaffManagement&success=Thành công');
        }
    } 
?>