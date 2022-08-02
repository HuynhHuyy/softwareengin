<?php
//cho danh mục
if (isset($_GET["Danhmuc"]) && !empty($_GET["Danhmuc"])) {
    $danhmuc = $_GET['Danhmuc'];
    $sql = "SELECT * FROM product WHERE type_product =  '$danhmuc'";
    $sql_query = mysqli_query($mysqli,$sql);
}
//cho tìm kiếm
else if (isset($_GET["SearchKey"]) && !empty($_GET["SearchKey"])) {
    $key = $_GET["SearchKey"];
    $sql = "SELECT * FROM product WHERE 
    product_name LIKE BINARY '%$key%' OR price LIKE BINARY '%$key%' OR info_product LIKE BINARY '%$key%' OR type_product LIKE BINARY '%$key%' OR 
    product_name LIKE '%$key%' OR price LIKE '%$key%' OR info_product LIKE '%$key%' OR type_product LIKE '%$key%' OR brand LIKE '%$key%'";
    $sql_query = mysqli_query($mysqli,$sql);
    $row = mysqli_num_rows($sql_query);
    if($row == 0){
        echo "<h2> Không có sản phẩm bạn tìm </h2>";
    }
} 
//mặc định
else {
    $sql = "SELECT * FROM product";
    $sql_query = mysqli_query($mysqli,$sql);
}
while ($data_product = mysqli_fetch_array($sql_query)) {
?>
    <div class="col-sm-6 col-md-4">
        <a href="index.php?content=DetailProduct&id=<?php echo $data_product['product_id'] ?>">
            <div class="card">
                <img class="card-img-top" src="img/<?php echo $data_product['img_product']?>" alt="Card image cap">
                <div class="card-body text-left">
                    <h5 class="card-title"><?php echo $data_product['product_name'] ?></h5>
                    <p><?php echo number_format($data_product['price'], 0, '',',') ?></p>
                    <p class="card-text"><?php echo $data_product['brand'] ?></p>
                    <form action="Client/Process/AddProductToCart.php" method="POST">
                        <input type="hidden" name="product_id" value="<?php echo $data_product["product_id"] ?>">
                        <button class="btn btn-outline-primary btn-block" type="submit" id="AddToCart"><i class="material-icons">add_shopping_cart</i></button>
                    </form>
                </div>
            </div>
        </a>
    </div>
<?php 
} ?>