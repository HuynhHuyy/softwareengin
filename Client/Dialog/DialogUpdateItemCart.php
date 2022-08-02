<div class="modal fade" id="UpdateItem<?php echo $id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title font-weight-bold" id="exampleModalLongTitle">Cập nhật sản phẩm</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" style="font-size: 30px;">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="Client/Process/UpdateItemCart.php"method="POST">
                    <div class="text-left" style="font-size: 20px;">
                        <label class="font-weight-bold" for="Quantity">Số lượng</label>
                        <input class="form-control" name="number_product" type="number" min="0" max="100" value="<?php echo $row["number_product"] ?>">
                    </div>
                    <input type="hidden" name="product_id" value="<?php echo $row["product_id"] ?>">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary font-weight-bold" data-dismiss="modal">Đóng</button>
                        <button name="submit" type="submit" class="btn btn-primary pl-4 pr-4 font-weight-bold">Cập nhật</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
