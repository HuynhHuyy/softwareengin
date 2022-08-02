<?php
    if(isset($_GET['content'])){
        $active = $_GET['content'];
    } else $active = "";

    include ('Client/Process/GetNumberProduct.php');
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<div class="container">
  <a class="navbar-brand text-light">THE HOUSE</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link <?=($active == '') ? 'text-light':'' ?>" href="index.php" style="border-right: 1px solid #515151;">TRANG CHỦ</a>
      </li>  
      <li class="nav-item">
        <a class="nav-link <?=($active == 'Contact') ? 'text-light':'' ?>" href="index.php?content=Contact" style="border-right: 1px solid #515151;">LIÊN HỆ</a>
      </li> 
      <li class="nav-item">
        <form action="index.php" class="form-inline ml-3" method="GET">
          <input class="form-control mr-sm-2" type="text" placeholder="Search..." aria-label="Search" name="SearchKey" value="<?php if (isset($_GET["SearchKey"])) echo $_GET["SearchKey"] ?>">
          <button class="btn btn-outline-primary my-2 my-sm-0" type="submit"><i class="fa fa-search"></i></button>
        </form>
      </li> 
        <a href="index.php?content=Cart" class="ml-2 pt-1">
          <i class="fa fa-2x"> &#xf07a; </i> 
          <span class='badge badge-warning' id='lblCartCount'> <?php echo $Item ?></span>
        </a>
    </ul>
    <a class="btn btn-primary" href="index.php?content=Login" > ĐĂNG NHẬP</a>
  </div>
</nav>
</div>





     