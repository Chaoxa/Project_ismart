<?php get_header() ?>
<style>
    .view-mode {
        padding: 5px 89px;
        display: inline-block;
        position: absolute;
        top: 9%;
        left: 50%;
        transform: translate(-50%, -50%);
        font-size: 15px;
        border: 1px solid #2f80ed;
        box-shadow: 15px 5px 20px white;
        color: black;
        font-weight: 600;
        border-radius: 4px;
        background: rgb(209, 209, 58);
        text-transform: uppercase;
        opacity: 0.6;
    }

    .view-mode:hover {
        background: rgb(231, 231, 31);
        transition: all 0.5s;
        opacity: 1;
    }

    .show {
        max-height: 600px;
        overflow: hidden;
    }
</style>
<div id="main-content-wp" class="clearfix detail-product-page">
    <div class="wp-inner">
        <div class="secion" id="breadcrumb-wp">
            <div class="secion-detail">
                <ul class="list-item clearfix">
                    <li>
                        <a href="" title="">Trang chủ</a>
                    </li>
                    <li>
                        <a href="" title="">Điện thoại</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-content fl-right">
            <div class="section" id="detail-product-wp">
                <div class="section-detail clearfix">

                    <div class="thumb-wp fl-left">
                        <a href="" title="" id="main-thumb">
                            <img id="zoom" src="<?php echo $detail_product['thumb_main'] ?>" width="350" data-zoom-image="<?php echo $detail_product['thumb_main'] ?>">
                        </a>
                        <div id="list-thumb">
                            <?php foreach ($detail_product['thumb_detail'] as $value) { ?>
                                <a href="" data-image="<?php echo $value ?>" data-zoom-image="<?php echo $value ?>">
                                    <img id="zoom" src="<?php echo $value ?>">
                                </a>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="thumb-respon-wp fl-left">
                        <img src="public/images/img-pro-01.png" alt="">
                    </div>
                    <div class="info fl-right">
                        <h3 class="product-name"><?php echo $detail_product['product_name'] ?></h3>
                        <div class="desc">
                            <?php echo $detail_product['product_desc'] ?>
                        </div>
                        <div class="num-product">
                            <span class="title">Sản phẩm: </span>
                            <span class="status">Còn hàng (<?php echo $detail_product['amount'] ?>)</span>
                        </div>
                        <div class="mb-2">
                            <span class="price"><?php echo price($detail_product['new_price'], 'VNĐ') ?></span><del class="m-2"><?php echo price($detail_product['old_price'], 'VNĐ') ?></del>
                        </div>
                        <div id="num-order-wp">
                            <a title="" id="minus"><i class="fa fa-minus"></i></a>
                            <input type="text" name="num-order" value="1" id="num-order">
                            <a title="" id="plus"><i class="fa fa-plus"></i></a>
                        </div>
                        <a href="<?php echo $detail_product['url_add_cart'] ?>" title="Thêm giỏ hàng" class="btn btn-success px-3 py-2 btn-style "><span>Thêm giỏ hàng</span></a>
                    </div>
                </div>
            </div>
            <div class="section more-info show" id="post-product-wp">
                <div class="section-head">
                    <h3 class="section-title">Mô tả sản phẩm</h3>
                </div>
                <div class="section-detail" style="position:relative;">
                    <?php echo $detail_product['product_detail'] ?>
                    <div class="btn-more-info">
                        <button class="view-mode">Xem thêm</button>
                    </div>
                </div>
            </div>
            <script>
                $(document).ready(function() {
                    var height = $("#post-product-wp").height();
                    // alert(height)
                    if (height < 500) {
                        $(".view-mode").css("display", "none");
                    } else {
                        $("#post-product-wp").addClass('post-product');
                    }

                    $('button.view-mode').click(function() {
                        $('.post-product').toggleClass('show');
                        if ($('.post-product').hasClass('show')) {
                            $(".view-mode").removeAttr("style");
                            $(".view-mode").text("Xem thêm");
                        } else {
                            $(".view-mode").css("top", "100%");
                            $(".view-mode").text("Thu gọn");
                        }
                    });


                });
            </script>
            <div class="section" id="same-category-wp">
                <div class="section-head">
                    <h3 class="section-title">Cùng chuyên mục</h3>
                </div>
                <div class="section-detail">
                    <ul class="list-item">
                        <?php foreach ($list_product as $value) { ?>
                            <li>
                                <a href="<?php echo $value['url'] ?>" title="" class="thumb">
                                    <img src="<?php echo $value['thumb_main'] ?>">
                                </a>
                                <a href="<?php echo $value['url'] ?>" title="" class="product-name"><?php echo $value['product_name'] ?></a>
                                <div class="price">
                                    <span class="new"><?php echo price($value['new_price'], 'đ') ?></span>
                                    <?php if ($value['discount'] > 0) { ?>
                                        <span class="old"><?php echo price($value['old_price'], 'đ') ?></span>
                                    <?php } ?>
                                </div>
                                <div class="action clearfix">
                                    <a href="<?php echo $value['url_add_cart'] ?>" title="" class="add-cart fl-left">Thêm giỏ hàng</a>
                                    <a href="" title="" class="buy-now fl-right">Mua ngay</a>
                                </div>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
        <?php get_sidebar('detail-product') ?>
    </div>
</div>
<?php get_footer() ?>