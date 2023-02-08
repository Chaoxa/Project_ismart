<?php function get_list_cat_page()
{
    $result = array();
    $list_cat_page = db_fetch_array('SELECT * FROM `tbl_cat_page` WHERE 1');
    foreach ($list_cat_page as $value) {
        $value['url_update'] = "?mod=page&action=update_page&id={$value['cat_id']}";
        $value['url_delete'] = "?mod=page&action=delete_page&id={$value['cat_id']}";
        $value['url'] = "?mod=page&action=delete_page&id={$value['cat_id']}";
        $result[] = $value;
    }
    return $result;
}

function get_action_manager()
{
    require "layout/action_manager.php";
}
