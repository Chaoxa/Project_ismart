<?php

function construct()
{
    load_model('index');
}

function addAction()
{
    if (isset($_POST['btn-submit'])) {
        global $error;
        if (!empty($_POST['number_id'])) {
            $number_id = $_POST['number_id'];
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $time = date("d/m/Y") . ' | ' . date('H:i:s');
            $token = md5($time);
            $data = array(
                'product_token' => $token,
                'product_id' => $number_id,
            );
            db_insert('check_auth', $data);
            echo 'https://tranquy.unitopcv.com/?mod=qr&action=qr&token=' . $token;
        } else {
            $error['ID'] = 'Không được để trống ID sản phẩm';
        }
    }
    load_view('add');
}

function qrAction()
{
    $productqr = db_fetch_array('SELECT * FROM `check_auth` WHERE 1');
    $products = db_fetch_array('SELECT * FROM `tbl_product` WHERE 1');
    $token = $_GET['token'];
    foreach ($productqr as $value) {
        if ($token == $value['product_token']) {
            foreach ($products as $product) {
                if ($value['product_id'] == $product['id']) {
                    $info_product = $product;
                }
            }
        } else {
            $info_product = array();
        }
    }
    $data['product'] = $info_product;
    load_view('index', $data);
}
