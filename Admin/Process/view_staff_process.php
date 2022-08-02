<?php
          include('../../config/config.php');
 
    // include('./config/config.php');
    if(isset($_POST['staff_id'])){
        $staff_id = $_POST['staff_id'];

        // echo $return = $d_name;

        $sql = "SELECT * FROM staff WHERE staff_id = '$staff_id'";
        $row = mysqli_query($mysqli,$sql);    

        if(mysqli_num_rows($row) > 0){
            foreach($row as $data_staff){
                echo $return = '
                <table class="table">
                   
                    <tr>
                        <td> Họ và tên:</td> 
                        <td>'.$data_staff['staff_name'].'</td>
                    </tr>
                    <tr>
                        <td> Số điện thoại: </td> 
                        <td>'.$data_staff['phone'].'</td>
                    </tr>
                    <tr>
                        <td> Email: </td> 
                        <td> '.$data_staff['email'].'</td>
                    </tr>
                    <tr>
                        <td> Sinh nhật: </td> 
                        <td>'.$data_staff['birthday'].'</td>
                    </tr>
                </table>
                ';
            }
        }
        else{
            echo $return ="<h5> Not Found</h5>";
        }
    }
?>