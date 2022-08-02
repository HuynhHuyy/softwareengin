<?php
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = "SELECT * FROM product WHERE product_id = '$id'";
        $sql_query = mysqli_query($mysqli,$sql);
        $data_product = mysqli_fetch_array($sql_query);
    }
?>

<div class="container">
    <h1>Chi tiết sản phẩm</h1>
    <div class="row">
        <div class="col-lg-8 col-sm-12 rounded mx-auto d-block mt-5">
            <img class="img-fluid rounded" src="img/<?php echo $data_product['img_product']?>" alt="New York">
        </div>
        <div class="col-lg-4 col-sm-12 card">
            <h2 class="">
                <a class="" href="#"><?php echo $data_product['product_name'] ?></a>
            </h2><!--/product_title--><!--product_content-->
            <div class=""><!--product_content_content-->
            <label for="price">Giá:</label>
            <?php echo number_format($data_product['price'], 0, '',',') ?>
            <br>
            <label for="price">Thương hiệu:</label>
            <?php echo $data_product['brand'] ?>
            <br>
            <label for="price">Mô tả:</label>
            <?php echo $data_product['info_product'] ?>
            <form action="Client/Process/AddProductToCart.php" method="POST">
                    <input type="hidden" name="product_id" value="<?php echo $data_product["product_id"] ?>">
                    <button class="btn btn-outline-primary" type="submit" id="AddToCart"><i class="material-icons">add_shopping_cart</i></button>
            </form>
        </div>
    </div>
</div>