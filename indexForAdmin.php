<?php
    session_start();
    include('config/config.php');
    $phone = $_SESSION['phone'];
    $sql = "SELECT * FROM staff WHERE phone = '$phone'";
    $sql_query = mysqli_query($mysqli,$sql);
    $arr = mysqli_fetch_array($sql_query);
    if($arr['level'] != 0){
        header("Location:Logout.php");
    }
    $sql_thongke = "SELECT YEAR(date) AS year, MONTH(date) AS month, SUM(price) AS count
    FROM bill
    WHERE date > DATE_SUB(NOW(), INTERVAL 1 YEAR)
    GROUP BY year, month";
    $sql_query_thongke = mysqli_query($mysqli,$sql_thongke);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>ADMINISTRATOR</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- CSS Files -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="css/style.css" rel="stylesheet" />
    <script src="//code.jquery.com/jquery-1.9.1.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
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
    } else $active = "ProductManagement";
?>
<body>
    <div class="wrapper">
        <div class="sidebar" data-image="../assets/img/sidebar-5.jpg">
            <div class="sidebar-wrapper">
                <div class="logo">
                    <a href="javascript:;" class="simple-text">
                      ADMIN
                    </a>
                </div>
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link <?=($active == 'ProductManagement') ? 'bg-primary':'' ?>" href="indexforAdmin.php?content=ProductManagement">
                            <i class="nc-icon nc-icon nc-paper-2"></i>
                            <p>Quản lí sản phẩm</p>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link <?=($active == 'StaffManagement') ? 'bg-primary':'' ?>" href="indexforAdmin.php?content=StaffManagement">
                            <i class="nc-icon nc-bell-55"></i>
                            <p>Quản lí nhân viên</p>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link <?=($active == 'Statistical') ? 'bg-primary':'' ?>" href="indexforAdmin.php?content=Statistical">
                            <i class="nc-icon nc-bell-55"></i>
                            <p>Thống kê</p>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link <?=($active == 'ChangePassword') ? 'bg-primary':'' ?>" href="indexforAdmin.php?content=ChangePassword">
                            <i class="nc-icon nc-bell-55"></i>
                            <p>Đổi mật khẩu</p>
                        </a>
                    </li>
                    <li class="nav-item active active-pro">
                        <a class="nav-link active" href="Logout.php">
                            <i class="nc-icon nc-alien-33"></i>
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
                    <?php include('Admin/Content.php'); ?>       
                </div>
            </div>    
        </div>
    </div>
</body>
</html>
