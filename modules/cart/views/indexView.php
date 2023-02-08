<?php get_header() ?>
<style>
    #notify_empty {
        margin: 0px auto;
        width: 400px;
        padding: 50px 0px;
    }
</style>
<div id="main-content-wp" class="cart-page">
    <div class="section" id="breadcrumb-wp">
        <div class="wp-inner">
            <div class="section-detail">
                <ul class="list-item clearfix">
                    <li>
                        <a href="?" title="">Trang chủ</a>
                    </li>
                    <li>
                        <a href="" title="">Xác nhận</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <?php if (!empty($list_cart)) { ?>
        <div id="wrapper" class="wp-inner clearfix">
            <div class="section" id="info-cart-wp">
                <div class="section-detail table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <td>Mã sản phẩm</td>
                                <td>Ảnh sản phẩm</td>
                                <td>Tên sản phẩm</td>
                                <td>Giá sản phẩm</td>
                                <td>Số lượng</td>
                                <td colspan="2">Thành tiền</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($list_cart as $value) { ?>
                                <tr>
                                    <td><?php echo $value['product_code'] ?></td>
                                    <td>
                                        <a href="<?php echo $value['url'] ?>" title="" class="thumb">
                                            <img src="<?php echo $value['thumb_main'] ?>" alt="">
                                        </a>
                                    </td>
                                    <td>
                                        <a href="<?php echo $value['url'] ?>" title="" class="name-product"><?php echo $value['product_name'] ?></a>
                                    </td>
                                    <td><?php echo price($value['new_price'], 'VNĐ') ?></td>
                                    <td>
                                        <input type="number" max=10 min=1 name="qty[<?php echo $value['id'] ?>]" value="<?php echo $value['qty'] ?>" data-id="<?php echo $value['id'] ?>" class="num_order">
                                    </td>
                                    <td id="sub-total-<?php echo $value['id'] ?>"><?php echo price($value['sub_total'], 'VNĐ') ?></td>
                                    <td>
                                        <a href=" <?php echo $value['url_delete_cart'] ?>" title="Xóa sản phẩm khỏi giỏ hàng" class="del-product m-2 text-danger"><i class="fa fa-trash-o"></i></a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="7">
                                    <div class="clearfix">
                                        <p id="total-price" class="fl-right">Tổng giá: <span><?php if (!empty($_SESSION['cart']['buy'])) {
                                                                                                    echo price($_SESSION['cart']['total']['total'], 'VNĐ');
                                                                                                } ?></span></p>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="7">
                                    <div class="clearfix">
                                        <div class="fl-right">
                                            <a href="?" title="" id="update-cart">Mua tiếp</a>
                                            <a href="?mod=cart&action=checkout" title="" id="checkout-cart">Thanh toán</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            <div class="section" id="action-cart-wp">
                <div class="section-detail">
                    <a href="?mod=cart&action=delete_all" class="text-danger" title="" id="delete-cart">Xóa giỏ hàng</a>
                </div>
            </div>
        </div>
    <?php } else { ?>
        <div id="notify_empty">
            <a href="?"> <img src="https://bizweb.dktcdn.net/100/031/831/themes/740933/assets/empty-cart.png?1623312998512" alt="" class=""></a>
            <p>Chưa có sản phẩm nào trong giỏ hàng!! Click <a href="?"><b>Vào đây</b></a> để tiếp tục mua sắm.</p>
        </div>
    <?php } ?>
</div>
<script>
    //ajax giỏ hàng
    $(document).ready(function() {
        $(".num_order").change(function() {
            var id = $(this).attr("data-id");
            var qty = $(this).val();
            var data = {
                id: id,
                qty: qty,
            };
            console.log(data);
            $.ajax({
                url: "?mod=cart&action=update_ajax",
                method: "POST",
                data: data,
                dataType: "json",
                success: function(data) {
                    $("#sub-total-" + id).text(data.sub_total);
                    $("#total-price span").text(data.total);
                    // console.log(data);
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status);
                    alert(thrownError);
                },
            });
        });
    });
    //========>>>>>
</script>
<?php get_footer() ?>