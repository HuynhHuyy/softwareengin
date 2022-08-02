<div class="modal fade" id="DeleteItem<?php echo $id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title font-weight-bold" id="exampleModalLongTitle">Xóa sản phẩm</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" style="font-size: 30px;">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p class="text-left font-weight-bold" style="font-size: 20px;">Bạn có chắc muốn xóa vật phẩm này không?</p>
                <form action="Client/Process/DeleteItemCart.php" method="POST">
                    <input type="hidden" name="product_id" value="<?php echo $rowProduct["product_id"] ?>">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary font-weight-bold" data-dismiss="modal">Đóng</button>
                        <button type="submit" class="btn btn-primary pl-4 pr-4 font-weight-bold">Xóa sản phẩm</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>