<?php
function get_detail_product($id)
{
    $list_product = db_fetch_array('SELECT * FROM `tbl_product` WHERE 1');
    foreach ($list_product as $product) {
        if ($product['id'] == $id) {
            $product['url_add_cart'] = "?mod=cart&action=buy_now&id=$id";
            $product['thumb_detail'] = json_decode($product['thumb_detail'], true);
            return $product;
        }
    }
}

function get_cat($cat_id)
{
    $list_product_cat = db_fetch_array("SELECT * FROM `tbl_cat_product`");
    if (array_key_exists($cat_id, $list_product_cat)) {
        return $list_product_cat[$cat_id];
    } else {
        return false;
    }
}

function get_cat_product_by_id($id)
{
    $product = db_fetch_row("SELECT * FROM `tbl_product` WHERE `id` = $id");
    $cat_id = $product['parent_id'];
    $list_product = db_fetch_array("SELECT * FROM `tbl_product` WHERE `parent_id` = $cat_id");
    foreach ($list_product as &$value) {
        $value['url_add_cart'] = "?mod=cart&action=add_cart&id={$value['id']}";
        $value['url'] = "?mod=product&action=detail_product&id={$value['id']}";
    }
    return $list_product;
}

function get_list_products($parent_cat_id)
{
    $list_cat_product = db_fetch_array("SELECT * FROM `tbl_cat_product`");
    $list_product = db_fetch_array("SELECT * FROM `tbl_product` WHERE `temporary_delete` = '0'");
    $result = array();
    $list_result = array();
    foreach ($list_cat_product as $value) {
        if ($value['parent_id'] == $parent_cat_id) {
            $result[] = $value;
        }
    }
    foreach ($result as $item) {
        foreach ($list_product as $value) {
            if ($item['id'] == $value['cat_id']) {
                $value['url'] = "?mod=product&action=detail_product&id={$value['id']}";
                $value['url_buy_now'] = "?mod=cart&action=buy_now&id={$value['id']}";
                $list_result[] = $value;
            }
        }
    }
    return $list_result;
}


function get_title_parent_cat_by_id($id)
{
    $id = $id - 1;
    $list_parent_cat  = db_fetch_array("SELECT * FROM `tbl_cat_parent_product`");
    if (array_key_exists($id, $list_parent_cat)) {
        return $list_parent_cat[$id]['tbl_cat_parent_name'];
    }
}
