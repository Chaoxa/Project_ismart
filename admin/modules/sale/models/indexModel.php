<?php
function get_detail_product($id)
{
    $list_product = db_fetch_array("SELECT * FROM `tbl_product`");
    if (array_key_exists($id, $list_product)) {
        $list_product[$id]['url_add_cart'] = "?mod=cart&controller=index&action=add_cart&id={$id}";
        return $list_product[$id];
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

function get_list_product($cat_id)
{
    $list_product = db_fetch_array("SELECT * FROM `tbl_product`");
    $result = array();
    foreach ($list_product as $item) {
        if ($item['cat_id'] == $cat_id) {
            $item['url'] = "product-detail/chi-tiet-san-pham-{$item['id']}.html";
            $result[] = $item;
        }
    }
    return $result;
}



function get_detail($id)
{
    $result = array();
    $list_order = db_fetch_array('SELECT * FROM `tbl_order` WHERE 1');
    foreach ($list_order as $value) {
        $value['product'] = json_decode($value['product'], true);
        $value['amount'] = count($value['product']);
        $main_total = 0;
        foreach ($value['product'] as $item) {
            $main_total += $item['sub_total'];
        }
        $value['main_total'] = $main_total;
        $result[] = $value;
        if ($value['id'] == $id) {
            return $value;
        }
    }
    return $result;
}
