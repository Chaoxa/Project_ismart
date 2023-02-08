<?php
get_header();
$cart_json = json_decode($bill['product'], true);
// show_array($cart_json);
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <title>Đặt hàng thành công</title>
</head>

<body>
    <style>
        body {
            background: rgb(242, 239, 239);
        }

        #wrapper {
            max-width: 1200px;
            margin: auto;
        }

        .icon {
            text-align: center;
        }

        .icon img {
            max-width: 100px;
            height: auto;
            display: inline-block;
            margin-top: 20px;
        }

        #wp-info {
            background: white;
            border-radius: 1rem;
        }

        a.product_thumb img {
            max-width: 70px;
            height: auto;
        }

        #info_buy table thead tr th {
            text-align: center;
        }

        #info_buy table tbody td {
            align-items: center;
            text-align: center;
            line-height: 60px;
        }

        #info_buy table tbody td a {
            align-items: center;
            text-align: center;
            line-height: 60px;
            color: red;
            font-weight: 500;
        }
    </style>
    <div id="wrapper">
        <div id="order_success">
            <div class="icon"><img src="https://sablanca.vn/Images/icon/tick-iconblue.png" alt="Lỗi"></div>
            <h3 class="text-center my-2">Đặt hàng thành công</h3>
        </div>
        <div id="wp-info" class="p-3">
            <div id="info-cart">
                <p>Xin chào <b><?php echo $bill['fullname'] ?></b></p>
                <p>Chúc mừng bạn đã đặt hàng thành công sản phẩm của <b>TQ STORE.VN</b></p>
            </div>
            <div id="info-guest">
                <b class="py-2 d-block">Thôn tin người mua:</b>
                <div class="fullname">Người nhận: &emsp; &emsp; <b><?php echo $bill['fullname'] ?></b></div>
                <div class="tel">Điện thoại: &emsp; &emsp; &emsp; <b><?php echo $bill['phone'] ?></b></div>
                <div class="address">Địa chỉ: &emsp; &emsp; &emsp; <b><?php echo $bill['address'] ?></b></div>
                <?php if (!empty($bill['email'])) { ?>
                    <div class="note">Email: &emsp; &emsp;<b><?php echo $bill['email'] ?></b></div>
                <?php } ?>
                <div class="time">Thời gian: &emsp; &emsp;<b><?php echo $bill['time'] ?></b></div>
                <?php if (!empty($bill['note'])) { ?>
                    <div class="note">Chú thích: &emsp; &emsp;<b><?php echo $bill['note'] ?></b></div>
                <?php } ?>
                <div class="time"><span class="text-success">Thời gian giao hàng dự kiến</span>: <b><?php echo $bill['estimated_time'] ?></b></div>
                <div id="info_buy">
                    <b class="py-2 d-block">Chi tiết đơn hàng</b>
                    <table class="table table-bordered table-striped ">
                        <thead class="table-dark">
                            <tr>
                                <th>STT</th>
                                <th>Ảnh</th>
                                <th>Tên sản phẩm</th>
                                <th>Giá tiền</th>
                                <th>Số lượng</th>
                                <th>Tổng</th>
                            </tr>
                        </thead>

                        <?php
                        $temp = 0;
                        foreach ($cart_json as $item) {
                            $temp++;
                            global $main_total;
                            $main_total += $item['sub_total'];
                        ?>
                            <tbody>
                                <td><?php echo $temp ?></td>
                                <td><a href="" class="product_thumb"><img src="<?php echo $item['thumb_main'] ?>" alt="error"></a></td>
                                <td><a href="" class="text-center"><?php echo $item['product_name'] ?></a></td>
                                <td><?php echo price($item['new_price'], "VNĐ") ?></td>
                                <td><?php echo $item['qty'] ?></td>
                                <td><?php echo price($item['sub_total'], 'VNĐ') ?></td>
                            </tbody>
                        <?php } ?>
                        <tr>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th class="text-danger text-center"><?php echo price($main_total, 'VNĐ') ?></th>
                        </tr>
                    </table>
                </div>
                <hr>
                <b>Mọi thông tin đơn hàng đã được gửi trực tiếp vào email của bạn. Hãy kiểm tra để biết thêm chi tiết
                </b>
                <p>Cảm ơn bạn đã tin tưởng và giao dịch tại <b>TQ Store</b></p>
                <div class="buttom">
                    <a href="?" class="btn btn-success">Tiếp tục mua hàng</a>
                    <a href="https://mail.google.com/mail/u/0/?tab=rm#inbox" target="blank" class="btn btn-danger">Check Email</a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
<?php get_footer() ?>