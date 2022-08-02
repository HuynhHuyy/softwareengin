<?php
    if (isset($_GET["SearchKey"]) && !empty($_GET["SearchKey"])) {
      $key = $_GET["SearchKey"];
      $sql = "SELECT * FROM product WHERE 
      product_name LIKE BINARY '%$key%' OR price LIKE BINARY '%$key%' OR info_product LIKE BINARY '%$key%' OR type_product LIKE BINARY '%$key%' OR 
      product_name LIKE '%$key%' OR price LIKE '%$key%' OR info_product LIKE '%$key%' OR type_product LIKE '%$key%' OR brand LIKE '%$key%'";
      $sql_query = mysqli_query($mysqli,$sql);
    } else{
        $sql = "SELECT * FROM product";
        $sql_query = mysqli_query($mysqli,$sql);
    }
    include ('Client/Process/GetNumberProduct.php');
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
  <form action="indexForStaff.php" class="form-inline my-2 my-lg-0 d-flex" method="GET">
    <input class="form-control mr-sm-2 p-2" type="text" placeholder="Search..." aria-label="Search" name="SearchKey" value="<?php if (isset($_GET["SearchKey"])) echo $_GET["SearchKey"] ?>">
    <button class="btn btn-outline-success my-2 my-sm-0 " type="submit"><i class="fa fa-search"></i></button>
  </form>
  <a href="indexforStaff.php?content=Bill" class="ml-2 pt-1">
    <i class="fa fa-2x"> &#xf07a; </i> 
    <span class='badge badge-warning' id='lblCartCount'> <?php echo $Item ?></span>
  </a>
</div>
<!-- table -->
<div class="container min-vh-100" id="box">
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
                  <form action="Staff/Process/add_product_to_cart.php" method="POST">
                        <input type="hidden" name="product_id" value="<?php echo $data_product["product_id"] ?>">
                        <button class="btn btn-outline-primary btn-block" type="submit" id="AddToCart"><i class="material-icons">add_shopping_cart</i></button>
                    </form>
              </td>
          </tr>
          <?php
          $i++;
          }
        ?>
    </tbody>
  </table>
</div>
