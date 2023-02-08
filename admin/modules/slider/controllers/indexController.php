<?php

function construct()
{
    //    echo "DÙng chung, load đầu tiên";
    load_model('index');
}

function add_sliderAction()
{
    global $time, $error, $creator, $sort, $target_file, $slug;
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $time = date("d/m/Y") . ' | ' . date('H:i');
    $creator = user_login();
    if (isset($_POST['btn-submit'])) {
        $error = array();
        if (!empty($_POST['slug'])) {
            $slug = $_POST['slug'];
        }
        if (empty($_POST['sort'])) {
            $error['sort'] = '(*)Không được để trống số thứ tự!';
        } else {
            $sort = $_POST['sort'];
        }
        // show_array($_FILES['file_upload']);
        #upload main image
        $file_upload_name = $_FILES['file_upload']['name'];
        #Tạo đường dẫn file chứa images
        $target_dir = "public/uploads/";
        #Tạo đường dẫn file sau khi upload lên hệ thống
        $target_file = $target_dir . $file_upload_name;
        $file_upload_size = $_FILES['file_upload']['size'];
        $file_type = pathinfo($file_upload_name, PATHINFO_EXTENSION);
        $file_type_allow = array('jpg', 'png', 'jpeg', 'gif');
        // echo $target_file;

        if (empty($_FILES['file_upload']['name'])) {
            $error["file_upload"] = "(*)Không được để trống ảnh chính!";
        } else if ($file_upload_size > 5242880) {
            $error["file_upload"] = "Kích thước file không được vượt quá 5MB";
        } else if (!in_array(strtolower($file_type), $file_type_allow)) {
            $error["file_upload"] = "Chỉ cho upload file ảnh có đuôi jpg,png,jpeg,gif";
        } else if (file_exists($target_file)) {
            $error['file_upload'] = "File $target_file đã tồn tại trên hệ thống!";
        } else {
            $flag_1 = true;
        }

        #Kiểm tra sự tồn tại của file trên hệ thống
        // show_array($list_target_file);
        if (empty($error) && isset($flag_1)) {
            $file_upload_tmp_name = $_FILES['file_upload']['tmp_name'];
            move_uploaded_file($file_upload_tmp_name, $target_file);
            $data = array(
                'thumb_main' => "admin/public/uploads/$file_upload_name",
                'time' => $time,
                'sort' => $sort,
                'creator' => $creator,
                'link' => $slug,
            );
            db_insert('tbl_slide', $data);
            redirect('?mod=slider&action=list_slider');
        }
    }
    load_view('add_slider');
}


function list_sliderAction()
{
    $list_slider = db_fetch_array('SELECT * FROM `tbl_slide` where 1');
    // show_array($list_slider);
    $data['list_slider'] = $list_slider;
    load_view('list_slider', $data);
}

function update_sliderAction()
{
    $id = $_GET['id'];
    $list_slider = db_fetch_row("SELECT * FROM `tbl_slide` where `id` = $id");
    global $error, $sort, $slug;
    // show_array($list_slider);
    if (isset($_POST['btn-submit'])) {
        $error = array();
        if (!empty($_POST['slug'])) {
            $slug = $_POST['slug'];
        }
        if (empty($_POST['sort'])) {
            $error['sort'] = '(*)Không được để trống số thứ tự!';
        } else {
            $sort = $_POST['sort'];
        }
        if (empty($error)) {
            $data = array(
                'sort' => $sort,
                'link' => $slug,
            );
            db_update('tbl_slide', $data, "`id` = $id");
            redirect('?mod=slider&action=list_slider');
        }
    }
    $data['list_slider'] = $list_slider;
    load_view('update_slider', $data);
}


function delete_temporaryAction()
{
    $id = $_GET['id'];
    $data = array(
        'status' => 1,
    );
    db_update('tbl_slide', $data, "`id` = $id");
    redirect('?mod=slider&action=list_slider');
}


function garbage_sliderAction()
{
    $list_slider = db_fetch_array("SELECT * FROM `tbl_slide` WHERE `status` = '1'");
    $data['list_slider'] = $list_slider;
    load_view('garbage', $data);
}

function restoreAction()
{
    $id = $_GET['id'];
    $data = array(
        "status" => 0
    );
    db_update('tbl_slide', $data, "`id` = $id");
    redirect('?mod=slider&action=garbage_slider');
}

function delete_sliderAction()
{
    $id = $_GET['id'];
    db_delete("tbl_slide", "`id`= $id");
    redirect('?mod=slider&action=garbage_slider');
}
