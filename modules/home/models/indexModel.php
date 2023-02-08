<?php
function get_list_featured_products()
{
    $list_product = db_fetch_array("SELECT * FROM `tbl_product` WHERE `featured_products` = '1' and `temporary_delete` = '0'");
    $result = array();
    foreach ($list_product as $product) {
        $product['thumb_detail'] = json_decode($product['thumb_detail'], true);
        $product['url'] = "?mod=product&action=detail_product&id={$product['id']}";
        $product['url_add_cart'] = "?mod=cart&action=add_cart&id={$product['id']}";
        $product['url_buy_now'] = "?mod=cart&action=buy_now&id={$product['id']}";
        $result[] = $product;
    }
    return $result;
};

function get_cat($cat_id)
{
    $list_product_cat = db_fetch_array("SELECT * FROM `tbl_cat_product`");
    if (array_key_exists($cat_id, $list_product_cat)) {
        return $list_product_cat[$cat_id];
    } else {
        return false;
    }
}

function get_list_products($parent_id)
{
    $list_product = db_fetch_array("SELECT * FROM `tbl_product` WHERE `featured_products` = '0' and `temporary_delete` = '0' ");
    $result = array();
    foreach ($list_product as $item) {
        if ($item['parent_id'] == $parent_id) {
            $item['url'] = "?mod=product&action=detail_product&id={$item['id']}";
            $item['url_add_cart'] = "?mod=cart&action=add_cart&id={$item['id']}";
            $item['url_buy_now'] = "?mod=cart&action=buy_now&id={$item['id']}";
            $result[] = $item;
        }
    }
    return $result;
}

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
