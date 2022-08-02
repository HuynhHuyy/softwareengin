<?php 
    require_once 'Client/Process/SetCookie.php';
 ?>
<div class="container mt-5 min-vh-100">
    <div class="content">
        <h1>GIỎ HÀNG</h1>
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
            <?php include 'Client/Process/LoadCartProcess.php' ?>
            </tbody>    
            </table>
            <div class="final mt-5 mb-5">
                <h1>Tổng thanh toán: <i><?php echo number_format($TotalPrice, 0, '',',')?> VND</i></h1>
                <button type="button" id="button-order" class="btn btn-primary font-weight-bold" data-toggle="modal" data-target="#Order">
                    Thanh Toán 
                </button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="Order" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title font-weight-bold" id="exampleModalLongTitle">Hoàn tất thanh toán</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" style="font-size: 30px;">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="Client/Process/PayProcess.php" method="post">
                    <div class="form-group font-weight-bold" style="font-size: 20px;">
                        <label for="txtName">Họ và tên của bạn</label>
                        <input style="font-size: 20px;" class="form-control font-weight-bold" type="text" name="name" placeholder="Nhập tên" required>
                        <label for="txtPhoneNumber">Số điện thoại</label>
                        <input style="font-size: 20px;" class="form-control font-weight-bold" type="tel" name="phone" pattern="[0-9]{10}" placeholder="Nhập số điện thoại" required>
                        <label for="txtName">Địa chỉ</label>
                        <input style="font-size: 20px;" class="form-control font-weight-bold" type="text" name="address" placeholder="Nhập địa chỉ" required>
                        <label for="bank">Số tài khoản ngân hàng</label>
                        <input style="font-size: 20px;" class="form-control font-weight-bold" type="text" name="bank" placeholder="Nhập số tài khoản" required>
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


