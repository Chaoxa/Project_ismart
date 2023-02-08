<?php
function get_menu_cat_product_by_id($parent_id)
{
    $result = array();
    $list_cat = db_fetch_array('SELECT `id`, `cat_title`,`parent_id` FROM `tbl_cat_product` WHERE 1');
    foreach ($list_cat as $value) {
        if ($value['parent_id'] == $parent_id) {
            $result[] = $value;
        }
    }
    return $result;
}

function get_menu_product_by_cat_id($cat_id)
{
    $result = array();
    $list_product = db_fetch_array('SELECT * FROM `tbl_product` WHERE 1');
    foreach ($list_product as $value) {
        if ($value['cat_id'] == $cat_id) {
            $value['url'] = "?mod=product&action=detail_product&id={$value['id']}";
            $result[] = $value;
        };
    }
    return $result;
};
$list_menu = db_fetch_array('SELECT * FROM `tbl_cat_parent_product` WHERE 1');

?>
<div class="sidebar fl-left">
    <div class="section" id="category-product-wp">
        <div class="section-head">
            <h3 class="section-title">Danh mục sản phẩm</h3>
        </div>
        <div class="secion-detail">
            <ul class="list-item">
                <?php foreach ($list_menu as $value) { ?>
                    <li>
                        <a href="?mod=product&action=category_product&id=<?php echo $value['id'] ?>" title=""><?php echo $value['tbl_cat_parent_name'] ?></a>
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
    <div class="section" id="banner-wp">
        <div class="section-detail">
            <a href="?page=detail_product" title="" class="thumb">
                <img src="public/images/banner.png" alt="">
            </a>
        </div>
    </div>
</div>