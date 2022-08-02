<?php
    if (isset($_GET["SearchKey"]) && !empty($_GET["SearchKey"])) {
      $key = $_GET["SearchKey"];
      $sql = "SELECT * FROM product WHERE 
      product_name LIKE BINARY '%$key%' OR price LIKE BINARY '%$key%' OR info_product LIKE BINARY '%$key%' OR type_product LIKE BINARY '%$key%' OR 
      product_name LIKE '%$key%' OR price LIKE '%$key%' OR info_product LIKE '%$key%' OR type_product LIKE '%$key%' OR brand LIKE '%$key%'";
      $sql_query = mysqli_query($mysqli,$sql);
      $row = mysqli_num_rows($sql_query);
      if($row == 0){
          echo "<h2> Không có sản phẩm bạn tìm </h2>";
      }
    } else{
        $sql = "SELECT * FROM product";
        $sql_query = mysqli_query($mysqli,$sql);
    }
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
<form action="indexforAdmin.php?content=ProductManagement" class="form-inline my-2 my-lg-0 d-flex" method="GET">
<a class="btn btn-outline-primary mr-auto p-2" data-toggle="modal" data-target="#add-product">&#10133; Thêm sản phẩm</a>
  <input class="form-control mr-sm-2 p-2" type="text" placeholder="Search..." aria-label="Search" name="SearchKey" value="<?php if (isset($_GET["SearchKey"])) echo $_GET["SearchKey"] ?>">
  <button class="btn btn-outline-success my-2 my-sm-0 " type="submit"><i class="fa fa-search"></i></button>
</form>

</div>
<!-- table -->
<div class="container min-vh-100" id="box">
<?php include('includes/alert.php'); ?>
  <h1 class="text-center">Danh sách sản phẩm</h1>           
  <table class="table table-striped">
    <thead>
      <tr class = "text-center">
        <th>STT</th>
        <th>Hình ảnh</th>
        <th>Tên sản phẩm</th>
        <th>Giá</th>
        <th>Loại sản phẩm</th>
        <th>Thao tác</th>
      </tr>
    </thead>
    <tbody>
      <?php
          $i = 1;
          while($data_product = mysqli_fetch_array($sql_query)){
          ?>
          <tr id = "rows" class = "text-center"> 
              <td class ="product_id"><?php echo $data_product['product_id']; ?></td>
              <td ><?php echo $i; ?></td>
              <td > <img  id = "img_size"
                src="<?php echo "img/".$data_product['img_product']; ?>"
                alt="img_product"
              /></td>
              <td ><?php echo $data_product['product_name']; ?></td>
              <td ><?php echo number_format($data_product['price'], 0, '',',') ?></td>
              <td ><?php echo $data_product['type_product'] ?></td>
              <td>  
                  <a class="btn btn-dark m-1" href="Admin/Process/delete_product.php?id=<?php echo $data_product['product_id']?>"><i class="material-icons text-light">delete</i></a>
                  <a class="btn btn-danger procudtview_btn m-1"><i class="material-icons">visibility</i></a>
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
  //xem thông tin sản phẩm
$(document).ready(function(){
    $('.procudtview_btn').click(function(){

       var viewproduct= $(this).closest('tr').find('.product_id').text();
        $.ajax({
            type: "POST",
            url: "Admin/Process/view_product_process.php",
            data:{
                'product_id': viewproduct,
            },
            success: function(response){
                $('.product_viewing_data').html(response);
                $('#view-product').modal('show');

            }
        });
    });
});

//Sửa thông tin sản phẩm
$(document).ready(function(){
  $('.edit_btn').click(function(e){
        e.preventDefault();
        var product_id= $(this).closest('tr').find('.product_id').text();
        $.ajax({
            type: "POST",
            url: "Admin/Process/edit_product_process.php",
            data:{
                'product_id': product_id,
            },
            success: function(response){
                $.each(response,function(key,value){
                    $('#edit_id').val(value['product_id']);
                    $('#edit_product_name').val(value['product_name']);
                    $('#edit_price').val(value['price']);
                    $('#edit_type_product').val(value['type_product']);
                    $('#edit_info_product').val(value['info_product']);
                    $('#edit_brand').val(value['brand']);
                    $('#edit_number_product').val(value['number_product']);
                });
                $('#editproduct').modal('show');
            }
        });

    });


  });
</script>

<!-- Modal thêm sản phẩm -->
<form action="Admin/Process/add_product.php" method="post" class="modal fade" id="add-product" enctype= multipart/form-data>
    <div class="modal-dialog">
      <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header">
          <h3 class="modal-title">Thêm sản phẩm</h3>
        </div>
        <!-- Modal body -->
        <div class="modal-body">
            <label for="product_name">Tên sản phẩm</label>
            <input type="text" name="product_name" id="product_name" class="form-control" placeholder="Tên sản phẩm" required>
            <br>
            <label for="product_id">Mã sản phẩm</label>
            <input type="text" name="product_id" id="product_id" class="form-control" placeholder="Mã sản phẩm" required>
            <br>
            <label for="price">Giá bán</label>
            <input type="number" name="price" id="price" class="form-control" placeholder="Giá bán" required>
            <br>
            <label for="type">Loại sản phẩm:</label> <br>
            <select name="type" class="form-select form-select-lg mb-3 form-control" aria-label=".form-select-lg example" required>
              <option selected>Chọn loại sản phẩm</option>
              <option value="Tủ lạnh">Tủ lạnh</option>
              <option value="TV">TV</option>
              <option value="Máy giặt">Máy giặt</option>
              <option value="Máy lọc nước">Máy lọc nước</option>
              <option value="Máy lạnh">Máy lạnh</option>
              <option value="Máy hút bụi">Máy hút bụi</option>
            </select>
            <br>
            <label for="brand">Thương hiệu:</label> <br>
            <select name="brand" class="form-select form-select-lg mb-3 form-control" aria-label=".form-select-lg example">
              <option selected>Chọn thương hiệu</option>
              <option value="Panasonic">Panasonic</option>
              <option value="Hitachi">Hitachi</option>
              <option value="Toshiba">Toshiba</option>
              <option value="Daikin">Daikin</option>
              <option value="Hitachi">Samsung</option>
              <option value="Toshiba">TCL</option>
              <option value="Daikin">LG</option>
            </select>
            <br>
            <label for="img_product">Chọn hình ảnh cho sản phẩm</label>
            <input type="file" name="img_product" accept="image/*" class="form-control" required placeholder="Chọn nơi lưu ảnh">
            <br>
            <label for="number">Số lượng</label>
            <input type="number" name="number" id="number" class="form-control" placeholder="Số lượng" required>
            <br>
            <label for="info_product">Thông tin sản phẩm</label>
            <textarea id="info_product" name="info_product" rows="4" class="form-control" placeholder="Mô tả" required></textarea>
        </div>
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary" name="create">Thêm</button>
          <button type="button" class="btn btn-dark" data-dismiss="modal">Hủy</button>
        </div>
        <div class="errorMessage my-3"></div>
      </div>
    </div>
  </form>

  <!-- Modal xem sản phẩm -->
  <div class="modal fade" id="view-product" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h2 class="modal-title w-100" id="exampleModalLabel">Thông tin chi tiết sản phẩm</h2>
      </div>
      <div class="modal-body">
        <div class ="product_viewing_data w-100">
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-dark" data-dismiss="modal">Đóng</button>
      </div>
    </div>
  </div>
</div>



<!-- Modal sửa sản phẩm -->
<div class="modal fade" id="editproduct" tabindex="-1" aria-labelledby="editproduct" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title">Sửa thông tin sản phẩm</h3>
      </div>
  <form action="Admin/Process/edit_product_process.php" method="POST" enctype= multipart/form-data>
        <!-- Modal body -->
        <div class="modal-body">
            <input type="hidden" name = "edit_id" id ="edit_id">
            <div class ="form-group">
              <label for="product_name">Tên sản phẩm</label>
              <input type="text" name="product_name" id="edit_product_name" class="form-control" placeholder="Tên sản phẩm">
            </div>
            <br>

            <div class ="form-group">
            <label for="price">Giá tiền</label>
            <input type="text" name="price" id="edit_price" class="form-control" placeholder="Giá tiền">
            </div>
            <br>

            <div class ="form-group">
            <label for="price">Hình ảnh</label>
            <input type="file" name="img_product" class="form-control">
            </div>

            <div class ="form-group">
            <label for="type_product">Loại sản phẩm</label>
            <input type="text" name="type_product" id="edit_type_product" class="form-control" placeholder="Loại sản phẩm">
          </div>
          <br>
            <div class ="form-group">
            <label for="info_product">Thông tin sản phẩm</label>
            <input type="text" name="info_product" id="edit_info_product" class="form-control" placeholder="Thông tin sản phẩm">
          </div>

          <br>
            <div class ="form-group">
            <label for="brand">Thương hiệu</label>
            <input type="text" name="brand" id="edit_brand" class="form-control" placeholder="Nhãn hiệu">
          </div>

          <br>
          <div class ="form-group">
            <label for="brand">Số lượng còn lại trong kho</label>
            <input type="text" name="number_product" id="edit_number_product" class="form-control" placeholder="Số lượng còn trong kho">
          </div>
      </div>
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary" name="edit_product">Lưu</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Hủy</button>
        </div>
        </form>
      </div>
    </div>
  </div>