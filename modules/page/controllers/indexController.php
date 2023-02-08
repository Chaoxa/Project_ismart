<?php

function construct()
{
    load_model('index');
}

function detail_pageAction()
{
    $id = $_GET['id'];
    $page = db_fetch_row("SELECT * FROM `tbl_page` WHERE `cat_id` = $id");
    $data['page'] = $page;
    $data['num_row_page'] =  db_num_rows("SELECT * FROM `tbl_page` WHERE `cat_id` = $id");
    load_view('index', $data);
}
