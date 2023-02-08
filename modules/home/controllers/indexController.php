<?php

function construct()
{
    #Model dùng chung
    load_model('index');
    load('lib', 'validation_form');
}

function homeAction()
{
    $list_featured_products = get_list_featured_products();
    $list_products_pc = get_list_products(1);
    $array_parent = db_fetch_array("SELECT * FROM `tbl_cat_parent_product` WHERE 1");
    $random = array_rand($array_parent, 2);
    $ran1 = $random[0] + 1;
    $ran2 = $random[1] + 1;
    $list_cat_parent = db_fetch_array("SELECT * FROM `tbl_cat_parent_product` WHERE `id` = '$ran1' OR `id` = '$ran2'");
    $list_slider = db_fetch_array('SELECT * FROM `tbl_slide`  WHERE `status` = "0" ORDER BY sort ASC');

    $data['list_slider'] = $list_slider;
    $data['list_featured_products'] = $list_featured_products;
    $data['list_cat_parent'] = $list_cat_parent;
    $data['list_products_pc'] = $list_products_pc;

    load_view('home', $data);
}

function buy_nowAction()
{
    $id = $_GET['id'];
    $product = db_fetch_row("SELECT * FROM `tbl_product` WHERE `id` = $id");
    $data['product'] = $product;
    // show_array($product);
    load_view('buy_now', $data);
}
