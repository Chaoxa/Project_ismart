<?php

function construct()
{
    //    echo "DÙng chung, load đầu tiên";
    load_model('index');
}
function detail_productAction()
{
    $id = $_GET['id'];
    $detail_product = get_detail_product($id);
    $list_product = get_cat_product_by_id($id);
    $data['detail_product'] = $detail_product;
    $data['list_product'] = $list_product;
    load_view('detail', $data);
}

function category_productAction()
{
    $id = $_GET['id'];
    $list_product = get_list_products($id);
    // show_array($list_product);
    $title = get_title_parent_cat_by_id($id);
    $data['list_product'] =  $list_product;
    $data['title'] = $title;
    // show_array($list_product);
    load_view('category', $data);
}
