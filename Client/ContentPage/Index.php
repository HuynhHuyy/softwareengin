<?php
  include('config/config.php');
    $sql = "SELECT * FROM product";
    $sql_query = mysqli_query($mysqli,$sql);
    if(isset($_GET['Danhmuc'])){
      $active = $_GET['Danhmuc'];
  } else $active = "";
    
?>
<div class="container min-vh-100" style="margin-top:30px">
  <div class="row">
    <div class="col-sm-3">
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link <?=($active == '') ? 'btn-primary':'' ?>" href="index.php">All</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?=($active == 'Tủ lạnh') ? 'btn-primary':'' ?>" href="index.php?Danhmuc=Tủ lạnh">Tủ lạnh</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?=($active == 'TV') ? 'btn-primary':'' ?>" href="index.php?Danhmuc=TV">TV</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?=($active == 'Máy lọc nước') ? 'btn-primary':'' ?>" href="index.php?Danhmuc=Máy lọc nước">Máy lọc nước</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?=($active == 'Máy lạnh') ? 'btn-primary':'' ?>" href="index.php?Danhmuc=Máy lạnh">Máy lạnh</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?=($active == 'Máy hút bụi') ? 'btn-primary':'' ?>" href="index.php?Danhmuc=Máy hút bụi">Máy hút bụi</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?=($active == 'Máy giặt') ? 'btn-primary':'' ?>" href="index.php?Danhmuc=Máy giặt">Máy giặt</a>
        </li>
      </ul>
    </div>
    <div class="col-sm-9">
      <row class="row">
      <?php
      include('includes/alert.php');
      include('Product.php');
      ?>
      </row>
    </div>
  </div>
</div>
<script>
  window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function() {
            $(this).remove();
        });
    }, 2000);
</script>