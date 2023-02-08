<?php

function construct()
{
    //    echo "DÙng chung, load đầu tiên";
    load_model('index');
}

function list_orderAction()
{
    $list_order = db_fetch_array('SELECT * FROM tbl_order ORDER BY id DESC');
    // show_array($list_order);
    $data['list_order'] = $list_order;
    if (isset($_POST['sm_action']) && !empty($_POST['checkItem'])) {
        // show_array($_POST);
        $result = array();
        foreach ($_POST['checkItem'] as $value) {
            $data = array(
                'progress' => $_POST['actions'],
            );
            db_update('tbl_order', $data, "id = $value");
        }
    }
    load_view('list_order', $data);
}

function detail_orderAction()
{
    $id = $_GET['id'];
    // show_array($list_detail);
    if (isset($_POST['sm_status'])) {
        $data = array(
            'progress' => $_POST['status']
        );
        db_update('tbl_order', $data, "`id` = $id");
        redirect('?mod=sale&action=list_order');
    }
    $list_detail = get_detail($id);
    $data['list_detail'] = $list_detail;
    load_view('detail_order', $data);
}

function list_customerAction()
{
    load_view('list_customer');
}

function delete_orderAction()
{
    $id = $_GET['id'];
    db_delete('tbl_order', "`id` = $id");
    redirect('?mod=sale&action=list_order');
}

function update_ajaxAction()
{
    $id = $_POST['id'];
    $progress = $_POST['progress'];

    $data = array(
        'progress' => $progress
    );
    db_update('tbl_order', $data, "`id` = $id");

    $amount2 = count_amount('tbl_order', '`progress`= "2"');
    $amount0 =  count_amount('tbl_order', '`progress`= "0"');
    $amount3 = count_amount('tbl_order', '`progress`= "3"');

    $total_list_order = db_fetch_array('SELECT * FROM `tbl_order` WHERE `progress` = "2"');


    foreach ($total_list_order  as &$value) {
        $value['product'] = json_decode($value['product'], true);
        $main_total = 0;
        // show_array($value);
        foreach ($value['product'] as $item) {
            $main_total += $item['sub_total'];
        }
        $value['main_total'] = $main_total;
    }

    // show_array($total_list_order);
    $total_sales = 0;
    foreach ($total_list_order as &$value) {
        $total_sales += $value['main_total'];
    }


    // $total = price($total_sales, 'VNĐ');
    $dataa = array(
        'progress' => $progress,
        'amount2' => $amount2,
        'amount0' => $amount0,
        'amount3' => $amount3,
        'total_sales' => price($total_sales, 'VNĐ')
    );
    echo json_encode($dataa);
}
