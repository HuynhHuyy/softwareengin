<?php
    $sql = "SELECT * FROM warranty";
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
<div class="container">
<a class="btn btn-outline-primary mb-2" data-toggle="modal" data-target="#add-warranty">&#10133; Tạo phiếu bảo hành</a>
</div>
<!-- table -->
<div class="container min-vh-100" id="box">
<?php include('includes/alert.php'); ?>
  <h1>Danh sách phiếu bảo hành</h1>           
  <table class="table table-striped">
    <thead>
      <tr class = "text-center">
        <th>STT</th>
        <th>Tên khách hàng</th>
        <th>Số điện thoại</th>
        <th>Địa chỉ</th>
        <!-- <th>Ngày nhận sản phẩm</th>
        <th>Ngày dự kiến trả sản phẩm</th>
        <th>Mô tả</th> -->
        <th>Thao tác</th>
      </tr>
    </thead>
    <tbody>
      <?php
          $i = 1;
          while($data_warranty = mysqli_fetch_array($sql_query)){
          ?>
          <tr id = "rows" class = "text-center"> 
              <td class ="customer_id"><?php echo $data_warranty['customer_id']; ?></td>
              <td ><?php echo $i; ?></td>
              <td ><?php echo $data_warranty['customer_name']; ?> </td>
              <td ><?php echo $data_warranty['customer_phone']; ?></td>
              <td ><?php echo $data_warranty['customer_address']; ?></td> 
              <td>  
                  <a class="btn btn-dark" href="Staff/Process/delete_warranty.php?id=<?php echo $data_warranty['customer_id']?>"><i class="material-icons text-light">delete</i></a>
                  <a class="btn btn-danger warrantyview_btn"><i class="material-icons">visibility</i></a>
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
  // xem thong tin phieu bao hanh
$(document).ready(function(){
    $('.warrantyview_btn').click(function(){

       var viewwarranty= $(this).closest('tr').find('.customer_id').text();
        $.ajax({
            type: "POST",
            url: "Staff/Process/view_warranty_process.php",
            data:{
                'warranty_id': viewwarranty,
            },
            success: function(response){
                $('.warranty_viewing_data').html(response);
                $('#view-warranty').modal('show');

            }
        });
    });
});


//Sửa thông tin sản phẩm
$(document).ready(function(){
  $('.edit_btn').click(function(e){
        e.preventDefault();
        var warranty_id= $(this).closest('tr').find('.customer_id').text();
        $.ajax({
            type: "POST",
            url: "Staff/Process/edit_warranty_process.php",
            data:{
                'warranty_id': warranty_id,
            },
            success: function(response){
                $.each(response,function(key,value){
                    $('#edit_id').val(value['customer_id']);
                    $('#edit_customer_name').val(value['customer_name']);
                    $('#edit_customer_phone').val(value['customer_phone']);
                    $('#edit_customer_address').val(value['customer_address']);
                    $('#edit_date_receive').val(value['date_receive']);
                    $('#edit_date_return').val(value['date_return']);
                    $('#edit_description').val(value['description']);
                });
                $('#editwarranty').modal('show');
            }
        });

    });
  });
</script>



<!-- Modal tạo phiếu bảo hành -->
<form action="Staff/Process/add_warranty.php" method="post" class="modal fade" id="add-warranty" enctype= multipart/form-data>
    <div class="modal-dialog">
      <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header">
          <h3 class="modal-title">Tạo phiếu bảo hành</h3>
        </div>
        <!-- Modal body -->
        <div class="modal-body">
            <label for="customer_name">Tên khách hàng</label>
            <input type="text" name="customer_name" id="customer_name" class="form-control" placeholder="Tên khách hàng">
            <br>
            <label for="customer_phone">Số điện thoại</label>
            <input type="text" name="customer_phone" id="customer_phone" class="form-control" placeholder="Số điện thoại khách hàng">
            <br>
            <label for="customer_address">Địa chỉ</label>
            <input type="text" name="customer_address" id="customer_address" class="form-control" placeholder="Địa chỉ của khách hàng">
            <br>
            <label for="date_receive">Ngày nhận sản phẩm bảo hành</label> <br>
            <input type="date" name="date_receive" id="date_receive" class="form-control" placeholder="Ngày nhận sản phẩm bảo hành">
            <br>
            <label for="date_return">Ngày dự kiến trả sản phẩm</label> <br>
            <input type="date" name="date_return" id="date_return" class="form-control" placeholder="Ngày dự kiến trả sản phẩm">
            <br>
            <br>
       
            <label for="description">Mô tả</label>
            <textarea id="description" name="description" rows="4" class="form-control" placeholder="Mô tả" required></textarea>
       
        </div>
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary" name="add_warranty">Tạo</button>
          <button type="button" class="btn btn-dark" data-dismiss="modal">Hủy</button>
        </div>
        <div class="errorMessage my-3"></div>
      </div>
    </div>
  </form>



  <!-- Modal xem phiếu bảo hành -->
  <div class="modal fade" id="view-warranty" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h2 class="modal-title w-100" id="exampleModalLabel">Thông tin phiếu bảo hành</h2>
      </div>
      <div class="modal-body">
        <div class ="warranty_viewing_data w-100">
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-dark" data-dismiss="modal">Đóng</button>
      </div>
    </div>
  </div>
</div>


<!-- Modal sửa phiếu bảo hành -->
<div class="modal fade" id="editwarranty" tabindex="-1" aria-labelledby="editwarranty" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title">Sửa thông tin phiếu bảo hành</h3>
      </div>
  <form action="Staff/Process/edit_warranty_process.php" method="POST" enctype= multipart/form-data>
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
            <input type="text" name="customer_phone" id="edit_customer_phone" class="form-control" placeholder="Số điện thoại khách hàng">
            </div>
            <br>

            <div class ="form-group">
            <label for="customer_address">Địa chỉ khách hàng</label>
            <input type="text" name="customer_address" id="edit_customer_address" class="form-control" placeholder="Địa chỉ khách hàng">
          </div>
         

          <br>
            <div class ="form-group">
            <label for="date_receive">Ngày nhận bảo hành sản phẩm</label>
            <input type="date" name="date_receive" id="edit_date_receive" class="form-control" placeholder="Ngày nhận bảo hành sản phẩm">
          </div>

          <br>
            <div class ="form-group">
            <label for="date_return">Ngày dự kiến trả sản phẩm</label>
            <input type="date" name="date_return" id="edit_date_return" class="form-control" placeholder="Ngày dự kiến trả sản phẩm">
          </div>

          <br>
            <div class ="form-group">
            <label for="description">Mô tả tình trạng sản phẩm</label>
            <input type="text" name="description" id="edit_description" class="form-control" placeholder="Mô tả tình trạng sản phẩm">
          </div>

      </div>
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary" name="edit_warranty">Lưu</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Hủy</button>
        </div>
        </form>
      </div>
    </div>
  </div>