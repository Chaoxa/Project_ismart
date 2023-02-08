<?php get_header() ?>
<div id="main-content-wp" class="list-product-page">
    <div class="wrap clearfix">
        <?php require 'inc/sidebar.php'; ?>
        <div id="content" class="detail-exhibition fl-right">
            <div class="section" id="info">
                <div class="section-head">
                    <h3 class="section-title bg-dark d-inline-block p-2 img-rounded text-white">Thông tin đơn hàng</h3>
                    <span><b>---></b></span>
                    <h3 class="section-title bg-secondary d-inline-block p-1 mt-2 img-rounded text-white"><?php echo $list_detail['fullname'] ?></h3>
                </div>
                <ul class="list-item">
                    <li>
                        <h3 class="title">Mã đơn hàng</h3>
                        <span class="detail"><?php echo $list_detail['code_bill'] ?></span>
                    </li>
                    <li>
                        <h3 class="title">Địa chỉ nhận hàng</h3>
                        <span class="detail"><?php echo $list_detail['address'] . '/' . $list_detail['phone'] ?></span>
                    </li>
                    <li>
                        <h3 class="title">Thông tin vận chuyển</h3>
                        <span class="detail">Thanh toán tại nhà</span>
                    </li>
                    <?php if (!empty($list_detail['note'])) { ?>
                        <li>
                            <h3 class="title">Chú thích khách hàng</h3>
                            <span class="detail"><?php echo $list_detail['note'] ?></span>
                        </li>
                    <?php } ?>
                    <form method="POST" action="">
                        <li>
                            <h3 class="title">Tình trạng đơn hàng</h3>
                            <select name="status" class="mt-2">

                                <option value='0'>
                                    <?php if ($list_detail['progress'] == 0) {
                                        echo '---Chờ xác nhận---';
                                    } elseif ($list_detail['progress'] == 1) {
                                        echo '---Đang giao---';
                                    } elseif ($list_detail['progress'] == 2) {
                                        echo '---Thành công---';
                                    } elseif ($list_detail['progress'] == 3) {
                                        echo '---Đã hủy---';
                                    } ?>
                                </option>
                                <option value='0'>Chờ xác nhận</option>
                                <option value='1'>Đang giao</option>
                                <option value='2'>Thành công</option>
                                <option value='3'>Đã hủy</option>
                            </select>
                            <input type="submit" name="sm_status" value="Cập nhật đơn hàng">
                        </li>
                    </form>
                </ul>
            </div>
            <div class="section">
                <div class="section-head">
                    <h3 class="section-title">Sản phẩm đơn hàng</h3>
                </div>
                <div class="table-responsive">
                    <table class="table info-exhibition">
                        <thead>
                            <tr>
                                <td class="thead-text">STT</td>
                                <td class="thead-text">Ảnh sản phẩm</td>
                                <td class="thead-text">Tên sản phẩm</td>
                                <td class="thead-text">Đơn giá</td>
                                <td class="thead-text">Số lượng</td>
                                <td class="thead-text">Thành tiền</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $temp = 0;
                            foreach ($list_detail['product'] as $value) {
                                $temp++ ?>
                                <tr>
                                    <td class="thead-text"><?php echo $temp ?></td>
                                    <td class="thead-text">
                                        <div class="thumb">
                                            <img src="<?php echo format_link_image($value['thumb_main'], 'admin/') ?>" alt="">
                                        </div>
                                    </td>
                                    <td class="thead-text"><?php echo $value['product_name'] ?></td>
                                    <td class="thead-text"><?php echo price($value['new_price'], 'VNĐ') ?></td>
                                    <td class="thead-text"><?php echo $value['qty'] ?></td>
                                    <td class="thead-text"><?php echo price($value['sub_total'], 'VNĐ') ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="section">
                <h3 class="section-title">Giá trị đơn hàng</h3>
                <div class="section-detail">
                    <ul class="list-item clearfix">
                        <li>
                            <span class="total-fee">Tổng số lượng</span>
                            <span class="total">Tổng đơn hàng</span>
                        </li>
                        <li>
                            <span class="total-fee"><?php echo $list_detail['amount'] ?> sản phẩm</span>
                            <span class="total"><?php echo price($list_detail['main_total'], 'VNĐ') ?></span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<?php get_footer() ?>