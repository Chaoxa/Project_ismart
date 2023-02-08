<?php get_header() ?>
<div id="main-content-wp" class="clearfix category-product-page">
    <div class="wp-inner">
        <div class="secion" id="breadcrumb-wp">
            <div class="secion-detail">
                <ul class="list-item clearfix">
                    <li>
                        <a href="?" title="">Trang chủ</a>
                    </li>
                    <li>
                        <a href="" title="">Điện thoại</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-content fl-right">
            <div class="section" id="list-product-wp">
                <div class="section-head justify-content-between m-0">
                    <h3 class="section-title float-left"><?php echo $title ?></h3>
                </div>
                <div class="section-detail">
                    <ul class="list-item clearfix">
                        <?php foreach ($list_product as $value) { ?>
                            <li>
                                <a href="<?php echo $value['url'] ?>" title="" class="thumb">
                                    <img src="<?php echo $value['thumb_main'] ?>">
                                </a>
                                <a href="?page=detail_product" title="" class="product-name"><?php echo $value['product_name'] ?></a>
                                <div class="price">
                                    <span class="new"><?php echo price($value['new_price'], 'đ') ?></span>
                                    <?php if ($value['discount'] > 0) { ?>
                                        <span class="old"><?php echo price($value['old_price'], 'đ') ?></span>
                                    <?php } ?>
                                </div>
                                <div class="action clearfix">
                                    <a data-id="<?php echo $value['id'] ?>" title="Thêm giỏ hàng" class="add-cart fl-left">Thêm giỏ hàng</a>
                                    <a href="<?php echo $value['url_buy_now'] ?>" title="Mua ngay" class="buy-now fl-right">Mua ngay</a>
                                </div>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
            <div class="section" id="paging-wp">
                <div class="section-detail">
                    <ul class="list-item clearfix">
                        <li>
                            <a href="" title="">1</a>
                        </li>
                        <li>
                            <a href="" title="">2</a>
                        </li>
                        <li>
                            <a href="" title="">3</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <?php
        get_sidebar('cat-product')
        ?>
    </div>
</div>
<?php get_footer() ?>