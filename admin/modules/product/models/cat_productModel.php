<?php
//cập nhật list_product
function update_product_cat($cat_id)
{
    $item = db_fetch_row("SELECT * FROM `tbl_product_cat` WHERE `cat_id` = '{$cat_id}'");
    return $item;
}

//=====danh mục
function get_list_add_product_cat()
{
    $result = db_fetch_array("SELECT * FROM `tbl_product_cat`");
    if (count($result) > 0) {
        return $result;
    }
}
function get_list_product_cat()
{
    $result = db_fetch_array("SELECT * FROM `tbl_product_cat`");
    if (count($result) > 0) {
        return $result;
    }
}
