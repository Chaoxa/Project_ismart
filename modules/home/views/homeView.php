<?php get_header() ?>
<style>
    .warning {
        color: rgb(0, 38, 255);
    }

    .item img {
        width: 878px;
        height: 450px;
    }
</style>
<div id="main-content-wp" class="home-page clearfix dark">
    <div class="wp-inner">
        <div class="main-content fl-right">
            <div class="section" id="slider-wp">
                <div class="section-detail">
                    <?php foreach ($list_slider as $value) { ?>
                        <div class="item">
                            <a href="<?php echo $value['link'] ?>"> <img src="<?php echo $value['thumb_main'] ?>" alt=""></a>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <div class="section" id="support-wp">
                <div class="section-detail dark">
                    <ul class="list-item clearfix">
                        <li>
                            <div class="thumb">
                                <img src="public/images/icon-1.png">
                            </div>
                            <h3 class="title">Miễn phí vận chuyển</h3>
                            <p class="desc">Tới tận tay khách hàng</p>
                        </li>
                        <li>
                            <div class="thumb">
                                <img src="public/images/icon-2.png">
                            </div>
                            <h3 class="title">Tư vấn 24/7</h3>
                            <p class="desc">1900.9999</p>
                        </li>
                        <li>
                            <div class="thumb">
                                <img src="public/images/icon-3.png">
                            </div>
                            <h3 class="title">Tiết kiệm hơn</h3>
                            <p class="desc">Với nhiều ưu đãi cực lớn</p>
                        </li>
                        <li>
                            <div class="thumb">
                                <img src="public/images/icon-4.png">
                            </div>
                            <h3 class="title">Thanh toán nhanh</h3>
                            <p class="desc">Hỗ trợ nhiều hình thức</p>
                        </li>
                        <li>
                            <div class="thumb">
                                <img src="public/images/icon-5.png">
                            </div>
                            <h3 class="title">Đặt hàng online</h3>
                            <p class="desc">Thao tác đơn giản</p>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="section" id="feature-product-wp">
                <div class="section-head">
                    <h3 class="section-title">Sản phẩm nổi bật</h3>
                    <script>
                        var object = document.querySelector('.section-title')
                        setInterval(function() {
                            object.classList.toggle('warning')
                        }, 200)
                    </script>
                </div>
                <div class="section-detail">
                    <ul class="list-item">
                        <?php foreach ($list_featured_products as $value) { ?>
                            <li class="m-0 mt-2 dark">
                                <?php if ($value['discount'] > 0) { ?>
                                    <div class="d-flex justify-content-between" id="discount">
                                        <img src="https://ruoungoaigiasi.vn/image/catalog/san-pham/khuyen-mai.gif" alt="" width="60">
                                        <div class="box-discount">
                                            <img id="bg-percent" src="https://www.pngkey.com/png/detail/15-151868_free-download-sale-icon.png" alt="" width="30">
                                            <h2 class="percent"><?php echo $value['discount'] . '%' ?></h2>
                                        </div>
                                    </div>
                                <?php } ?>
                                <a href="<?php echo $value['url'] ?>" title="" class="thumb">
                                    <img src="<?php echo $value['thumb_main'] ?>">
                                </a>
                                <a href="<?php echo $value['url'] ?>" title="" class="product-name dark"><?php echo $value['product_name'] ?></a>
                                <div class="price">
                                    <span class="new"><?php echo price($value['new_price'], 'đ') ?></span>
                                    <?php if ($value['discount'] > 0) { ?>
                                        <span class="old"><?php echo price($value['old_price'], 'đ') ?></span>
                                    <?php } ?>

                                </div>
                                <div class="action clearfix">
                                    <a data-id="<?php echo $value['id'] ?>" title="" class="add-cart fl-left btn-style dark"><span class="text-style">Thêm giỏ hàng</span></a>
                                    <a href="<?php echo $value['url_buy_now'] ?>" title="" class="buy-now fl-right btn-style"><span class="text-style">Mua ngay</span></a>
                                </div>
                            </li>
                        <?php  } ?>
                    </ul>
                </div>
            </div>
            <?php foreach ($list_cat_parent as $value) { ?>
                <div class="section" id="list-product-wp">
                    <div class="section-head">
                        <h3 class="section-title"><?php echo $value['tbl_cat_parent_name'] ?></h3>
                    </div>
                    <?php $list_product = get_list_products($value['id']);
                    ?>
                    <div class="section-detail">
                        <ul class="list-item clearfix">
                            <?php foreach ($list_product as $value) { ?>
                                <li class="dark">
                                    <a href="<?php echo $value['url'] ?>" title="" class="thumb">
                                        <img src="<?php echo $value['thumb_main'] ?>">
                                    </a>
                                    <a href="<?php echo $value['url'] ?>" title="" class="product-name dark"><?php echo $value['product_name'] ?></a>
                                    <div class="price">
                                        <span class="new"><?php echo price($value['new_price'], 'đ') ?></span>
                                        <?php if ($value['discount'] > 0) { ?>
                                            <span class="old"><?php echo price($value['old_price'], 'đ') ?></span>
                                        <?php } ?>
                                    </div>
                                    <div class="action clearfix">
                                        <a data-id="<?php echo $value['id'] ?>" title="" class="add-cart fl-left btn-style dark"><span>Thêm giỏ hàng</span></a>
                                        <a href="<?php echo $value['url_buy_now'] ?>" title="" class="buy-now fl-right btn-style"><span>Mua ngay</span></a>
                                    </div>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            <?php } ?>
        </div>
        <?php get_sidebar() ?>
    </div>
</div>

<?php get_footer() ?>