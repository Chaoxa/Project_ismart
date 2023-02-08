<?php
function get_list_blog()
{
    $result = array();
    $list_blog = db_fetch_array('SELECT * FROM `blog` WHERE `status` = "1"');
    foreach ($list_blog as $value) {
        $value['url'] = "?mod=blog&action=detail_blog&id={$value['id']}";
        $result[] = $value;
    }
    return $result;
}
