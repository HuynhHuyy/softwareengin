<?php
    $sql = "SELECT * FROM staff";
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
<a class="btn btn-outline-primary mb-2" data-toggle="modal" data-target="#add-staff">&#10133; Thêm sản nhân viên</a>
</div>
<!-- table -->
<div class="container" id="box">
<?php include('includes/alert.php'); ?>
  <h1 class="text-center">Danh sách nhân viên</h1>           
  <table class="table table-striped">
    <thead>
      <tr class = "text-center">
        <th>STT</th>
        <th>Họ và Tên</th>
        <th>Số điện thoại</th>
        <th>Ngày sinh</th>
        <th>Email</th>
        <th>Thao tác</th>
      </tr>
    </thead>
    <tbody>
        <?php
            $i = 1;
            while($data_staff = mysqli_fetch_array($sql_query)){
              $date_birth = date_create($data_staff['birthday']);
            ?>
            <tr id = "rows" class = "text-center"> 
                <td class ="staff_id"><?php echo $data_staff['staff_id']; ?></td>
                <td ><?php echo $i; ?></td>
                <td ><?php echo $data_staff['staff_name']; ?></td>
                <td ><?php echo $data_staff['phone']; ?></td>
                <td ><?php echo date_format($date_birth, 'd/m/Y') ?></td>
                <td ><?php echo $data_staff['email']; ?></td>
                <td>  
                    <a class="btn btn-dark m-1" href="Admin/Process/delete_staff.php?id=<?php echo $data_staff['staff_id']?>"><i class="material-icons text-light">delete</i></a>
                    <a class="btn btn-danger staffview_btn m-1"><i class="material-icons">visibility</i></a>
                    <a class="btn btn-success edit_btn m-1"><i class="material-icons">border_color</i></a>
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
  // <!-- Xem thông tin nhân viên -->
 $(document).ready(function(){
    $('.staffview_btn').click(function(){

       var viewstaff= $(this).closest('tr').find('.staff_id').text();
        $.ajax({
            type: "POST",
            url: "Admin/Process/view_staff_process.php",
            data:{
                'staff_id': viewstaff,
            },
            success: function(response){
                $('.staff_viewing_data').html(response);
                $('#view-staff').modal('show');

            }
        });
    });
});

// Sửa thông tin nhân viên
$(document).ready(function(){
  $('.edit_btn').click(function(e){
        e.preventDefault();
        var staff_id= $(this).closest('tr').find('.staff_id').text();
        $.ajax({
            type: "POST",
            url: "Admin/Process/edit_staff_process.php",
            data:{
                'staff_id': staff_id,
            },
            success: function(response){
                $.each(response,function(key,value){
                    $('#edit_id').val(value['staff_id']);
                    $('#edit_staff_name').val(value['staff_name']);
                    $('#edit_phone').val(value['phone']);
                    $('#edit_email').val(value['email']);
                    $('#edit_birthday').val(value['birthday']);

                });
                $('#editstaff').modal('show');
            }
        });

    });


  });
</script>


<!--Modal Thêm nhân viên -->
<form action="Admin/Process/add_staff.php" method="post" class="modal fade" id="add-staff">
    <div class="modal-dialog">
      <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header">
          <h3 class="modal-title">Thêm nhân viên</h3>
        </div>
        <!-- Modal body -->
        <div class="modal-body">
            <label for="name">Tên nhân viên</label>
            <input type="text" name="name" id="name" class="form-control" placeholder="Tên nhân viên">
            <br>
            <label for="phone">Số điện thoại</label>
            <input type="text" name="phone" id="phone" class="form-control" placeholder="Số điện thoại">
            <br>
            <label for="email">Email</label>
            <input type="text" name="email" id="email" class="form-control" placeholder="Email">
            <br>
            <label for="birthday">Ngày sinh</label>
            <input type="date" name="birthday" id="birthday" class="form-control" placeholder="Ngày sinh">
            <br>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="level" value='1' checked>
              <label class="form-check-label" for="inlineRadio1">Nhân viên bán hàng</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="level" value='2' >
              <label class="form-check-label" for="inlineRadio2">Nhân viên kỹ thuật</label>
            </div>
        </div>
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="create" class="btn btn-primary" name="create">Thêm</button>
          <button type="button" class="btn btn-dark" data-dismiss="modal">Hủy</button>
        </div>
        <div class="errorMessage my-3"></div>
      </div>
    </div>
  </form>

  <!--Modal Xem thông tin chi tiết của nhân viên -->
  <div class="modal fade" id="view-staff" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h2 class="modal-title w-100" id="exampleModalLabel">Thông tin chi tiết nhân viên</h2>
      </div>
      <div class="modal-body">
        <div class ="staff_viewing_data w-100">
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-dark" data-dismiss="modal">Đóng</button>
      </div>
    </div>
  </div>
</div>


<!--Modal Sửa thông tin nhân viên -->

<div class="modal fade" id="editstaff" tabindex="-1" aria-labelledby="editstaff" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title">Sửa thông tin nhân viên</h3>
      </div>
  <form action="Admin/Process/edit_staff_process.php" method="POST">
        <!-- Modal body -->
        <div class="modal-body">
            <input type="hidden" name = "edit_id" id ="edit_id">
            <div class ="form-group">
              <label for="staff_name">Tên nhân viên</label>
              <input type="text" name="staff_name" id="edit_staff_name" class="form-control" placeholder="Tên nhân viên">
            </div>
            <br>

            <div class ="form-group">
            <label for="phone">Số phòng</label>
            <input type="text" name="phone" id="edit_phone" class="form-control" placeholder="Số điện thoại">
            </div>
            <br>
            <div class ="form-group">
            <label for="email">Email</label>
            <input type="text" name="email" id="edit_email" class="form-control" placeholder="Email">
          </div>
          <br>
            <div class ="form-group">
            <label for="birthday">Ngày sinh</label>
            <input type="date" name="birthday" id="edit_birthday" class="form-control" placeholder="Ngày sinh">
          </div>
      </div>
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary" name="edit_staff">Lưu</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Hủy</button>
        </div>
        </form>
      </div>
    </div>
  </div>
  