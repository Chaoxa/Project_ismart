<?php get_header() ?>
<?php global $list_product, $search, $command;
// echo $command;
$list_product = get_pagging1('tbl_product', $search, $command);
// show_array($list_product);
foreach ($list_product as &$item) {
    $item['url'] = "?mod=product&action=detail_product&id={$item['id']}";
    $item['url_add_cart'] = "?mod=cart&action=add_cart&id={$item['id']}";
    $item['url_buy_now'] = "?mod=cart&action=buy_now&id={$item['id']}";
}
// show_array($list_product);
?>
<div id="main-content-wp" class="clearfix category-product-page">
    <div class="wp-inner">
        <div class="secion" id="breadcrumb-wp">
            <div class="secion-detail">
                <ul class="list-item clearfix">
                    <li>
                        <a href="?" title="">Trang chủ</a>
                    </li>
                    <li>
                        <a href="" title="">Sản phẩm</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-content fl-right">
            <div class="section" id="list-product-wp">
                <div class="section-head clearfix d-inline-block m-0 mt-4">
                    <h3 class="section-title float-right">Sản phẩm</h3>
                </div>
                <div class="filter-wp float-right">
                    <p class="desc">Hiển thị <?php echo count($list_product) ?> trên <?php echo count($total_product) ?> sản phẩm</p>
                    <div class="form-filter">
                        <form method="POST" action="">
                            <select name="select">
                                <option value="">Sắp xếp</option>
                                <option value="ASC">Giá thấp lên cao</option>
                                <option value="DESC">Giá cao xuống thấp</option>
                            </select>
                            <button type="submit" name="btn-filter" class="btn bg-dark">Lọc</button>
                        </form>
                    </div>
                </div>
                <div class="section-detail">
                    <ul class="list-item clearfix">
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
                                <style>
                                    .add-cart:hover {
                                        background: yellow;
                                    }

                                    .buy-now:hover {
                                        background: greenyellow;
                                    }
                                </style>
                                <div class="action clearfix">
                                    <a data-id="<?php echo $value['id'] ?>" class="add-cart fl-left">Thêm giỏ hàng</a>
                                    <a href="<?php echo $value['url_buy_now'] ?>" title="Mua ngay" class="buy-now fl-right">Mua ngay</a>
                                </div>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
            <?php global $num_pages, $page;
            echo get_pagging2($num_pages, $page, "?mod=category_product&action=home") ?>
        </div>
        <?php get_sidebar('cat-product') ?>
    </div>
</div>
<?php get_footer() ?>