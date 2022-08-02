

<?php
if(isset($_GET['content']))
    {
    $content = $_GET['content'];
    }
else
    {
    $content='';
    }
    // Admin
    if ($content=="ProductManagement")
    {
        include('Admin/ContentPage/ProductManagement.php');
    }
    else if($content=="StaffManagement"){
        include('Admin/ContentPage/StaffManagement.php');
    }
    else if($content=="ChangePassword"){
        include('Admin/ContentPage/ChangePassword.php');
    }
    else if($content=="Statistical"){
        include('Admin/ContentPage/Statistical.php');
    }
    else
    {
        include('Admin/ContentPage/ProductManagement.php');
    }
?>