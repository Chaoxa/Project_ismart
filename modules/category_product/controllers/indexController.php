<?php

function construct()
{
    #Model dùng chung
    load_model('index');
}

function homeAction()
{
    global $command;
    $command = 'ASC';
    if (isset($_POST['btn-filter'])) {
        // show_array($_POST);
        $command = $_POST['select'];
    }
    global $search;
    $search = '';
    if (!empty($_GET['key'])) {
        $search = $_GET['key'];
    }
    $total_product = db_fetch_array('SELECT * FROM `tbl_product` WHERE 1');
    // show_array($list_product_cat_parent);
    $data['total_product'] =  $total_product;
    load_view('index', $data);
}
