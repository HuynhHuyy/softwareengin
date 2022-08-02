<?php
session_start();
include('config/config.php');
if(isset($_SESSION['phone'])){
    $phone = $_SESSION['phone'];
    $sql = "SELECT * FROM staff WHERE phone = '$phone'";
    $sql_query = mysqli_query($mysqli,$sql);
    $data_staff = mysqli_fetch_array($sql_query);
} else{
    header("Location:index.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>NHÂN VIÊN</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- CSS Files -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="css/style.css" rel="stylesheet" />
    <script>
            window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function() {
                $(this).remove();
            });
        }, 2000);
    </script>
   
</head>
<?php
    if(isset($_GET['content'])){
        $active = $_GET['content'];
    } else $active = "Product";
?>
<body>
    <div class="wrapper">
        <div class="sidebar" data-image="../assets/img/sidebar-5.jpg">

            <div class="sidebar-wrapper">
                <div class="logo">
                    <a href="javascript:;" class="simple-text">
                    <?php if($data_staff['level'] == 1){ 
                        echo 'NHÂN VIÊN BÁN HÀNG';
                    }
                    else{
                        echo 'NHÂN VIÊN BẢO HÀNH';
                    }
                        ?>
                    
                    </a>
                </div>
                <ul class="nav">
                    <?php if($data_staff['level'] == 1){
                        
                        ?>
                        <li>
                            <a class="nav-link <?=($active == 'Product') ? 'bg-primary':'' ?>" href="indexforStaff.php?content=Product">
                                <i class="nc-icon nc-bell-55"></i>
                                <p>Sản phẩm</p>
                            </a>
                        </li>
                        
                        <li>
                            <a class="nav-link <?=($active == 'BillManagement') ? 'bg-primary':'' ?>" href="indexforStaff.php?content=BillManagement">
                                <i class="nc-icon nc-bell-55"></i>
                                <p>Quản lí hóa đơn</p>
                            </a>
                        </li>
                        <li>
                        <a class="nav-link <?=($active == 'CustomerManagement') ? 'bg-primary':'' ?>" href="indexforStaff.php?content=CustomerManagement">
                            <p>Quản lí khách hàng</p>
                        </a>
                        </li>
                        <li>
                            <a class="nav-link <?=($active == 'Bill') ? 'bg-primary':'' ?>" href="indexforStaff.php?content=Bill">
                                <i class="nc-icon nc-bell-55"></i>
                                <p>Hoá đơn</p>
                            </a>
                        </li>
                        <?php
                    }else{
                        ?>
                        <li>
                        <a class="nav-link <?=($active == 'WarrantyManagement') ? 'bg-primary':'' ?>" href="indexforStaff.php?content=WarrantyManagement">
                            <p>Quản lí phiếu bảo hành</p>
                        </a>
                        </li>
                        <?php
                    } ?>
                    <li>
                        <a class="nav-link <?=($active == 'ChangePassword') ? 'bg-primary':'' ?>" href="indexforStaff.php?content=ChangePassword">
                            <i class="nc-icon nc-bell-55"></i>
                            <p>Đổi mật khẩu</p>
                        </a>
                    </li>
                    <li class="nav-item active active-pro">
                        <a class="nav-link active" href="index.php">
                            
                            <p>Log out</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg " color-on-scroll="500">
                <div class="container-fluid">
                    
                </div>
            </nav>
            <!-- End Navbar -->
            <div class="content">
                <div class="container-fluid">
                    <?php include('Staff/Content.php'); ?>       
                </div>
            </div>
            
            </div>
            
        </div>
    </div>
  
</body>

</html>
