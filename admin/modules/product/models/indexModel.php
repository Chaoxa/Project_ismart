<?php
function get_list_product($field = "")
{
    $field == "" ? $where = 1 : $where = $field;
    $list_product = db_fetch_array("SELECT * FROM `tbl_product` WHERE $where");
    $result = array();
    foreach ($list_product as $value) {
        $value['url_update'] = "?mod=product&action=update_product&id={$value['id']}";
        $value['url_delete'] = "?mod=product&action=temporary_delete&id={$value['id']}";
        $value['url_retore'] = "?mod=product&action=restore&id={$value['id']}";
        $value['url_deleted'] = "?mod=product&action=delete_product&id={$value['id']}";

        $result[] = $value;
    }
    return $result;
}
function get_cat_product_by_id($parent_id)
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

function get_parent_product_by_id($id_product)
{
    $parent_id = db_fetch_row("SELECT `parent_id` FROM `tbl_cat_product` WHERE `id` = $id_product");
    return $parent_id['parent_id'];
}


function format_name_cat_by_number($number)
{
    $cat_product = db_fetch_array('SELECT * FROM `tbl_cat_product` WHERE 1');
    // show_array($cat_product);
    foreach ($cat_product as $value) {
        if ($value['id'] == $number) {
            return $result = $value['cat_title'];
        }
    }
}
function format_name_cat_parent_by_number($number)
{
    $cat_product = db_fetch_array('SELECT * FROM `tbl_cat_parent_product` WHERE 1');
    // show_array($cat_product);
    foreach ($cat_product as $value) {
        if ($value['id'] == $number) {
            return $result = $value['tbl_cat_parent_name'];
        }
    }
}

function get_action_manager()
{
    require "layout/action_manager.php";
}
