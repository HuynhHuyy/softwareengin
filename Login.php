<div class="col-md-8 col-lg-5 my-5 mx-2 mx-sm-auto border rounded px-3 py-3" id="box">    
    <h2 class="header text-center mb-3">ĐĂNG NHẬP HỆ THỐNG </h2>
    <form action="LoginProcess.php" method="post">
        <div class="form-group">
            <label for="phone">Số điện thoại</label>
            <input type="text" name="phone" value="" id="phone" onfocus="eraseText()" class="form-control" placeholder="Your phone" required>
        </div>
        <div class="form-group">
            <label for="pwd">Mật khẩu</label>
            <input type="password" name="pwd" value="" id="pwd" class="form-control" placeholder="Your password" required>
        </div>
        <p class="errorMessage my-3 text-danger" value=""><?php if(isset($_GET["msg"])) echo $_GET["msg"];?></p>
        <button type="submit" class="btn btn-primary px-5 mr-2" name = "login" id="submit">ĐĂNG NHẬP</button>
    </form>
</div>