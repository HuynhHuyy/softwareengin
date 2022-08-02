<?php 
    session_start();
    include('config/config.php');
    if(isset($_POST["phone"]) && !empty($_POST["phone"])
    && isset($_POST["pwd"]) && !empty($_POST["pwd"])) {
        $phone = $_POST["phone"];
        $pwd = $_POST["pwd"];
        $sql = "SELECT * FROM staff WHERE phone = '$phone' AND password = '$pwd'";
        $sql_query = mysqli_query($mysqli,$sql);
        $arr = mysqli_fetch_array($sql_query);
        $row = mysqli_num_rows($sql_query);
        if($row == 1) {
            $_SESSION["phone"] = $phone;
            if($arr['level'] == 0){
                header("Location:indexForAdmin.php");
            } else{
                header("Location:indexForStaff.php?content=WarrantyManagement");
            }
        }else {
            header("Location:index.php?content=Login&msg=Sai mật khẩu hoặc số điện thoại");
        }
    }
?>