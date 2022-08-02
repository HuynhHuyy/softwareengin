

<?php
    if(isset($_GET['content']))
        {
        $content = $_GET['content'];
        }
    else
        {
        $content='';
        }
        if($content=="BillManagement"){

            include('Staff/ContentPage/BillManagement.php');

        }else if($content=="WarrantyManagement"){

            include('Staff/ContentPage/WarrantyManagement.php');
        }
        else if($content=="ChangePassword"){
            include('Staff/ContentPage/ChangePassword.php');
        }
        else if($content=="CustomerManagement"){
            
            include('Staff/ContentPage/CustomerManagement.php');
        }
        else if($content=="Bill"){
            include('Staff/ContentPage/Bill.php');
        }
        else
        {
            include('Staff/ContentPage/Product.php');
            
        }   
?>