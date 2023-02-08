<?php $list_menu = db_fetch_array('SELECT * FROM `tbl_cat_parent_product` WHERE 1'); ?>
<div class="sidebar fl-left">
    <div class="section" id="category-product-wp">
        <div class="section-head">
            <h3 class="section-title">Danh mục sản phẩm</h3>
        </div>
        <div class="secion-detail">
            <ul class="list-item">
                <?php foreach ($list_menu as $value) { ?>
                    <li class="dark">
                        <a href="?mod=product&action=category_product&id=<?php echo $value['id'] ?>" class="dark" title=""><?php echo $value['tbl_cat_parent_name'] ?></a>
                        <?php $list_cat_menu = get_menu_cat_product_by_id($value['id']); ?>
                        <ul class="sub-menu">
                            <?php foreach ($list_cat_menu as $value) { ?>
                                <li>
                                    <a href="?page=category_product" title=""><?php echo $value['cat_title'] ?></a>
                                    <?php $list_product = get_menu_product_by_cat_id($value['id']); ?>
                                    <?php if (count($list_product) > 0) { ?>
                                        <ul class="sub-menu">
                                            <?php foreach ($list_product as $value) { ?>
                                                <li>
                                                    <a href="<?php echo $value['url'] ?>" title=""><?php echo $value['product_name'] ?></a>
                                                </li>
                                            <?php } ?>
                                        </ul>
                                    <?php } ?>
                                </li>
                            <?php } ?>
                            <li>
                        </ul>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </div>
    <div class="section" id="selling-wp">
        <div class="section-head">
            <h3 class="section-title">Sản phẩm bán chạy</h3>
        </div>
        <div class="section-detail">
            <ul class="list-item dark">
                <?php foreach ($list_products_pc as $value) { ?>
                    <li class="clearfix">
                        <a href="<?php echo $value['url'] ?>" title="" class="thumb fl-left">
                            <img src="<?php echo $value['thumb_main'] ?>" alt="">
                        </a>
                        <div class="info fl-right">
                            <a href="<?php echo $value['url'] ?>" title="" class="product-name dark"><?php echo $value['product_name'] ?></a>
                            <div class="price">
                                <span class="new"><?php echo price($value['new_price'], 'đ') ?></span>
                                <?php if ($value['discount'] > 0) { ?>
                                    <span class="old"><?php echo price($value['old_price'], 'đ') ?></span>
                                <?php } ?>
                            </div>
                            <a href="" title="" class="buy-now">Mua ngay</a>
                        </div>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </div>
    <div class="section" id="banner-wp">
        <div class="section-detail">
            <a href="" title="" class="thumb">
                <img src="public/images/banner.png" alt="">
            </a>
        </div>
    </div>
</div>