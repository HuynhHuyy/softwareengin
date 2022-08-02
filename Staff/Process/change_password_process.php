<?php
    session_start();
      include('../../config/config.php');
    if (isset($_POST['pwd'])) {
        $pwd = addslashes($_POST['pwd']);
    } else {
        $pwd = '';
    }
    if (isset($_POST['pwd-confirm'])) {
        $pwdconfirm = addslashes($_POST['pwd-confirm']);
    } else {
        $pwdconfirm = '';
    }
    if (isset($_POST['oldpassword'])) {
        $oldpassword = addslashes($_POST['oldpassword']);
    } else {
        $oldpassword = '';
    }
    if (isset($_POST['changepass'])) {
        $changepass = addslashes($_POST['changepass']);
    } else {
        $changepass = '';
    }
    if(isset($_SESSION['phone'])){
        $admin_phone = $_SESSION['phone'];
    } else{
        $admin_phone = "";
    }

    if(isset($_POST['changepass'])){
    
        $sql_select_oldpasswordfromdb = "SELECT * FROM staff WHERE phone = '$admin_phone' LIMIT 1 ";
        $query_select = mysqli_query($mysqli,$sql_select_oldpasswordfromdb);
        $count_temp = mysqli_num_rows($query_select);
        $oldpass_data = mysqli_fetch_array($query_select);

        if ($oldpassword != $oldpass_data['password']){   
            header("Location: ../../indexforStaff.php?content=ChangePassword&msg1=Mật khẩu cũ không trùng khớp");  
        }else{
            if($pwdconfirm != $pwd){
                header("Location: ../../indexforStaff.php?content=ChangePassword&msg1=Mật khẩu không trùng khớp");
            } else{
                $sql_update = "UPDATE staff SET password = '$pwd' where phone = '$Staff_phone'";
                mysqli_query($mysqli,$sql_update);
                header("Location: ../../indexforStaff.php?content=ChangePassword&success=Thành công");
            }
        }
    }

?>