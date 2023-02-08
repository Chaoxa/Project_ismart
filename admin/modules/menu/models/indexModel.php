<?php
function get_list_menu()
{
    $item = db_fetch_array("SELECT * FROM `tbl_menu`");
    return $item;
}