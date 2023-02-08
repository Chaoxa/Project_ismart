<?php
function list_cat_blog()
{
    $result = array();
    $list_cat_blog = db_fetch_array('SELECT * FROM `tbl_cat_blog` WHERE 1');
    foreach ($list_cat_blog as $value) {
        $value['url_update'] = "?mod=post&action=update_cat_blog&id={$value['cat_id']}";
        $value['url_delete'] = "?mod=post&action=delete_cat_blog&id={$value['cat_id']}";
        $result[] = $value;
    }
    return $result;
}

function list_blog()
{
    $result = array();
    $list_blog = db_fetch_array('SELECT * FROM `blog` WHERE 1');
    foreach ($list_blog as $value) {
        $value['url_update'] = "?mod=post&action=update_post&id={$value['id']}";
        $value['url_delete'] = "?mod=post&action=delete_post&id={$value['id']}";
        $result[] = $value;
    }
    return $result;
}
