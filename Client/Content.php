<?php
    if(isset($_GET['content']))
        {
        $content = $_GET['content'];
        }
    else
        {
        $content='';
        }
        //Client
        if($content=="Contact"){
            include('Client/ContentPage/Contact.php');

        }
        else if($content=="Introduce"){
            include('Client/ContentPage/Introduce.php');
        }
        else if($content=="Product"){
            include('Client/ContentPage/Product.php');
        }else if($content=="Login"){
            include('Login.php');
        }
        else if($content=="DetailProduct"){
            include('DetailProduct.php');
        }
        else if($content=="Cart"){
            include('Client/ContentPage/Cart.php');
        }
        else
        {
            include('Client/ContentPage/Index.php');
        }
    
    ?>