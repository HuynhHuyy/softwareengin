<?php
    $sql = "SELECT * FROM bill";
    $sql_query = mysqli_query($mysqli,$sql);
?>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!-- table -->
<div class="container" id="box">
<?php include('includes/alert.php'); ?>
  <h1 class="text-center">Danh sách hoá đơn</h1>           
  <table class="table table-striped">
    <thead>
      <tr class = "text-center">
        <th>STT</th>
        <th>Họ và Tên</th>
        <th>Số điện thoại</th>
        <th>Tổng tiền</th>
        <th>Loại hoá đơn</th>
        <th>Thao tác</th>
      </tr>
    </thead>
    <tbody>
        <?php
            $i = 1;
            while($data_bill = mysqli_fetch_array($sql_query)){
            ?>
            <tr id = "rows" class = "text-center"> 
            <td class ="bill_id"><?php echo $data_bill['bill_id']; ?></td>
                <td ><?php echo $i; ?></td>
                <td ><?php echo $data_bill['customer_name']; ?></td>
                <td ><?php echo $data_bill['phone']; ?></td>
                <td ><?php echo $data_bill['price']; ?></td>
                <td ><?php echo $data_bill['type_bill']; ?></td>
                <td>  
                    <a class="btn btn-dark" href="Staff/Process/delete_bill.php?id=<?php echo $data_bill['bill_id']?>"><i class="material-icons text-light">delete</i></a>
                    <a class="btn btn-danger billview_btn"><i class="material-icons">visibility</i></a>
                    <a class="btn btn-success edit_btn"><i class="material-icons">border_color</i></a>
                </td>
            </tr>
            <?php
            $i++;
            }
        ?>
    </tbody>
  </table>
</div>


<script>
  // xem thong tin hoá đơn
$(document).ready(function(){
    $('.billview_btn').click(function(){

       var bill_id= $(this).closest('tr').find('.bill_id').text();
        $.ajax({
            type: "POST",
            url: "Staff/Process/view_bill_process.php",
            data:{
                'bill_id': bill_id,
            },
            success: function(response){
                $('.bill_viewing_data').html(response);
                $('#view-bill').modal('show');

            }
        });
    });
});



// Sửa hoá đơn
$(document).ready(function(){
  $('.edit_btn').click(function(e){
        e.preventDefault();
        var bill_id= $(this).closest('tr').find('.bill_id').text();
        $.ajax({
            type: "POST",
            url: "Staff/Process/edit_bill_process.php",
            data:{
                'bill_id': bill_id,
            },
            success: function(response){
                $.each(response,function(key,value){
                    $('#edit_id').val(value['bill_id']);
                    $('#edit_customer_name').val(value['customer_name']);
                    $('#edit_phone').val(value['phone']);
                    $('#edit_address').val(value['address']);
                    $('#edit_list_item').val(value['list_item']);
                    $('#edit_price').val(value['price']);
                });
                $('#editbill').modal('show');
            }
        });

    });


  });
</script>



<!--Modal Xem thong tin hoa don -->
  <div class="modal fade" id="view-bill" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h2 class="modal-title w-100" id="exampleModalLabel">Thông tin hoá đơn</h2>
      </div>
      <div class="modal-body">
        <div class ="bill_viewing_data w-100">
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-dark" data-dismiss="modal">Đóng</button>
      </div>
    </div>
  </div>
</div>


  <!-- Modal sửa thông tin hoá đơn-->
<div class="modal fade" id="editbill" tabindex="-1" aria-labelledby="editbill" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title">Sửa thông tin hoá đơn</h3>
      </div>
  <form action="Staff/Process/edit_bill_process.php" method="POST" enctype= multipart/form-data>
        <!-- Modal body -->
        <div class="modal-body">
            <input type="hidden" name = "edit_id" id ="edit_id">
            <div class ="form-group">
              <label for="customer_name">Tên khách hàng</label>
              <input type="text" name="customer_name" id="edit_customer_name" class="form-control" placeholder="Tên Khách hàng">
            </div>
            <br>
            <div class ="form-group">
            <label for="customer_phone">Số điện thoại</label>
            <input type="text" name="phone" id="edit_phone" class="form-control" placeholder="Số điện thoại khách hàng">
            </div>
            <br>
            <div class ="form-group">
            <label for="customer_address">Địa chỉ khách hàng</label>
            <input type="text" name="address" id="edit_address" class="form-control" placeholder="Địa chỉ khách hàng">
          </div>
          <div class ="form-group">
            <label for="list_item">Sản phẩm mua</label>
            <input type="text" name="list_item" id="edit_list_item" class="form-control" placeholder="Sản phẩm mua">
          </div>

          <div class ="form-group">
            <label for="price">Tổng số tiền</label>
            <input type="text" name="price" id="edit_price" class="form-control" placeholder="Tổng số tiền">
          </div>
      </div>
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary" name="edit_bill">Lưu</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Hủy</button>
        </div>
        </form>
      </div>
    </div>
  </div>

 