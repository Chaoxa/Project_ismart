<?php

function construct()
{
    load_model('index');
}

function add_pageAction()
{
    if (isset($_POST['btn-submit'])) {
        $creator = user_login();
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $time = date("d/m/Y") . ' | ' . date('H:i');
        global $error, $title, $parent_cat, $notify;
        $error = array();
        if (empty($_POST['title'])) {
            $error['title'] = "(*)Không được để trống tên trang!";
        } else {
            $title = $_POST['title'];
        }
        if (empty($error)) {
            $data = array(
                'name_cat_page' => $title,
                'creator' => $creator,
                'time' => $time
            );
            db_insert('tbl_cat_page', $data);
            $notify['success'] = 'Đã thêm danh mục thành công.';
        }
    }
    load_view('add_page');
}
function add_detail_pageAction()
{
    if (isset($_POST['btn-submit'])) {
        $creator = user_login();
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $time = date("d/m/Y") . ' | ' . date('H:i');
        global $error, $title, $parent_cat, $notify;
        $error = array();
        if (empty($_POST['title'])) {
            $error['title'] = "(*)Không được để trống tên trang!";
        } else {
            $title = $_POST['title'];
        }
        if (empty($_POST['content'])) {
            $error['content'] = "(*)Không được để trống nội dung!";
        } else {
            $content = $_POST['content'];
        }
        if (empty($_POST['cat_id'])) {
            $error['cat_id'] = "(*)Không được để trống danh mục cha!";
        } else {
            $cat_id = $_POST['cat_id'];
        }
        if (empty($error)) {
            $data = array(
                'title' => $title,
                'content' => $content,
                'creator' => $creator,
                'time' => $time,
                'cat_id' => $cat_id
            );
            db_insert('tbl_page', $data);
        }
    }
    load_view('add_detail_page');
}


function list_pageAction()
{
    $list_cat_page = get_list_cat_page();
    $data['list_cat_page'] = $list_cat_page;
    load_view('list_page', $data);
}
function update_pageAction()
{
    $id = $_GET['id'];
    if (isset($_POST['btn-submit'])) {
        global $error, $title;
        $error = array();
        if (empty($_POST['title'])) {
            $error['title'] = "(*)Không được để trống tên trang!";
        } else {
            $title = $_POST['title'];
        }
        if (empty($error)) {
            $data = array(
                'name_cat_page' => $title,
            );
            db_update('tbl_cat_page', $data, "`cat_id` = $id");
            redirect('?mod=page&action=list_page');
        }
    }

    $name_cat_page = db_fetch_row("SELECT `name_cat_page` FROM `tbl_cat_page` WHERE `cat_id` = $id");
    $data['name_cat_page'] = $name_cat_page;
    load_view('update_page', $data);
}
function delete_pageAction()
{
    $id = $_GET['id'];
    db_delete('tbl_cat_page', "`cat_id` = $id");
    db_delete('tbl_page', "`cat_id` = $id");
    redirect('?mod=page&action=list_page');
}
