<?php get_header();
// show_array($data);
?>
<div id="main-content-wp" class="home-page">
    <div class="wp-inner clearfix">
        <?php get_sidebar() ?>
        <div id="content" class="fl-right">
            <div class="section list-cat">
                <div class="section-head">
                    <h3 class="section-title"><?php echo $list_product_cat['cat_title'] ?></h3>
                </div>
                <div class="section-detail">
                    <ul class="list-item clearfix">
                        <?php foreach ($list_product as $item) { ?>
                            <li>
                                <a href="<?php echo $item['url'] ?>" title="" class="thumb">
                                    <img src="<?php echo $item['product_thumb'] ?>" alt="">
                                </a>
                                <a href="?page=detail_product" title="" class="title"><?php echo $item['product_title'] ?></a>
                                <p class="price"><?php echo price($item['price'], 'VNĐ') ?></p>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>