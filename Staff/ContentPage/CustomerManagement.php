<?php
    $sql = "SELECT * FROM customer";
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
  <h1 class="text-center">Danh sách khách hàng</h1>           
  <table class="table table-striped">
    <thead>
      <tr class = "text-center">
        <th>STT</th>
        <th>Họ và Tên</th>
        <th>Số điện thoại</th>
        <th>Địa chỉ</th>
        <th>Thao tác</th>
      </tr>
    </thead>
    <tbody>
        <?php
            $i = 1;
            while($data_customer = mysqli_fetch_array($sql_query)){
            ?>
            <tr id = "rows" class = "text-center"> 
                <td class ="customer_id_custom"><?php echo $data_customer['customer_id']; ?></td>
                <td ><?php echo $i; ?></td>
                <td ><?php echo $data_customer['customer_name']; ?></td>
                <td ><?php echo $data_customer['phone']; ?></td>
                <td ><?php echo $data_customer['address']; ?></td>
                <td>  
                    <a class="btn btn-dark" href="Staff/Process/delete_customer.php?id=<?php echo $data_customer['customer_id']?>"><i class="material-icons text-light">delete</i></a>
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
$(document).ready(function(){
  $('.edit_btn').click(function(e){
        e.preventDefault();
        var customer_id= $(this).closest('tr').find('.customer_id_custom').text();
        $.ajax({
            type: "POST",
            url: "Staff/Process/edit_customer_process.php",
            data:{
                'customer_id': customer_id,
            },
            success: function(response){
                $.each(response,function(key,value){
                    $('#edit_id').val(value['customer_id']);
                    $('#edit_name_customer').val(value['customer_name']);
                    $('#edit_phone_customer').val(value['phone']);
                    $('#edit_address_customer').val(value['address']);
                });
                $('#editcustomer').modal('show');
            }
        });

    });


  });
</script>
  <!-- Modal sửa thông tin khách hàng -->
<div class="modal fade" id="editcustomer" tabindex="-1" aria-labelledby="editcustomer" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title">Sửa thông tin khách hàng</h3>
      </div>
  <form action="Staff/Process/edit_customer_process.php" method="POST" enctype= multipart/form-data>
        <!-- Modal body -->
        <div class="modal-body">
            <input type="hidden" name = "edit_id" id ="edit_id">
            <div class ="form-group">
              <label for="customer_name">Tên khách hàng</label>
              <input type="text" name="name_customer" id="edit_name_customer" class="form-control" placeholder="Tên Khách hàng">
            </div>
            <br>

            <div class ="form-group">
            <label for="customer_phone">Số điện thoại</label>
            <input type="text" name="phone_customer" id="edit_phone_customer" class="form-control" placeholder="Số điện thoại khách hàng">
            </div>
            <br>

            <div class ="form-group">
            <label for="customer_address">Địa chỉ khách hàng</label>
            <input type="text" name="address_customer" id="edit_address_customer" class="form-control" placeholder="Địa chỉ khách hàng">
          </div>

      </div>
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary" name="edit_customer">Lưu</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Hủy</button>
        </div>
        </form>
      </div>
    </div>
  </div>