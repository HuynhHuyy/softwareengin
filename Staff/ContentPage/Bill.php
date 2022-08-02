<?php 
    require_once 'Staff/Process/SetCookie.php';
 ?>
 <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<div class="container">
<?php include('includes/alert.php'); ?>
    <div class="content">
        <h1 class="text-center">Thông tin hoá đơn</h1>
        <div class="product">
            <table class="table table-striped">
            <thead>
                <tr class="text-center">
                    <th>Sản Phẩm</th>
                    <th>Số lượng</th>
                    <th>Giá</th>
                    <th>Chỉnh sửa</th>
                </tr>
            </thead>
            <tbody>
            <?php include 'Staff/Process/LoadCartProcess.php' ?>
            </tbody>    
            </table>
            <div class="final mt-5 mb-5">
                <h1>Tổng thanh toán: <i><?php echo number_format($TotalPrice, 0, '',',')?> VND</i></h1>
                <button type="button" id="button-order" class="btn btn-primary font-weight-bold" data-toggle="modal" data-target="#Order_bill">
                    Thanh Toán 
                </button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="Order_bill" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title font-weight-bold" id="exampleModalLongTitle">Hoàn tất thanh toán</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" style="font-size: 30px;">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="Staff/Process/pay.php" method="post">
                    <div class="form-group font-weight-bold" style="font-size: 20px;">
                        <label for="txtName">Họ và tên của bạn</label>
                        <input style="font-size: 20px;" class="form-control font-weight-bold" type="text" name="name" placeholder="Nhập tên" required>
                        <label for="txtPhoneNumber">Số điện thoại</label>
                        <input style="font-size: 20px;" class="form-control font-weight-bold" type="tel" name="phone" pattern="[0-9]{10}" placeholder="Nhập số điện thoại" required>
                        <label for="txtName">Địa chỉ</label>
                        <input style="font-size: 20px;" class="form-control font-weight-bold" type="text" name="address" placeholder="Nhập địa chỉ" required>
                    </div>
                    <div class="hidden">
                        <input type="text" name="price" value="<?php echo $TotalPrice ?>">
                        <input type="text" name="product" value="<?php echo $arr ?>">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary font-weight-bold" data-dismiss="modal">Đóng</button>
                        <button type="submit" name="pay" class="btn btn-primary pl-4 pr-4 font-weight-bold">Thanh toán</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
