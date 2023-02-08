<?php

function construct()
{
    load_model('index');
}

function add_postAction()
{
    $list_cat = db_fetch_array('SELECT * FROM `tbl_cat_blog` WHERE 1');
    $data['list_cat'] = $list_cat;
    if (isset($_POST['btn-submit'])) {
        global $error, $blog_title, $content_demo, $time, $content, $parent_Cat, $status, $notify;
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $time = date("d/m/Y") . ' | ' . date('H:i');
        $error = array();
        if (empty($_POST['title'])) {
            $error['title'] = '(*)Không được để trống tiêu đề bài viết!';
        } else {
            $blog_title = $_POST['title'];
        }
        if (empty($_POST['content_demo'])) {
            $error['content_demo'] = '(*)Không được để trống demo nội dung bài viết!';
        } else {
            $content_demo = $_POST['content_demo'];
        };
        if (empty($_POST['content'])) {
            $error['content'] = '(*)Không được để trống nội dung bài viết!';
        } else {
            $content = $_POST['content'];
        };
        if (empty($_POST['parent_Cat'])) {
            $error['parent_Cat'] = '(*)Không được để trống danh mục!';
        } else {
            $parent_Cat = $_POST['parent_Cat'];
        };
        if (empty($_POST['status'])) {
            $error['status'] = '(*)Không được để trống trạng thái!';
        } else {
            $status = $_POST['status'];
        };

        // show_array($_FILES);
        #upload main image
        $file_upload_name = $_FILES['file_upload']['name'];
        #Tạo đường dẫn file chứa images
        $target_dir = "public/uploads/";
        #Tạo đường dẫn file sau khi upload lên hệ thống
        $target_file = $target_dir . $file_upload_name;
        $file_upload_size = $_FILES['file_upload']['size'];
        $file_type = pathinfo($file_upload_name, PATHINFO_EXTENSION);
        $file_type_allow = array('jpg', 'png', 'jpeg', 'gif');

        if (empty($_FILES['file_upload']['name'])) {
            $error["file_upload"] = "(*)Không được để trống ảnh đại diện bài viết!";
        } else if ($file_upload_size > 5242880) {
            $error["file_upload"] = "Kích thước file không được vượt quá 5MB";
        } else if (!in_array(strtolower($file_type), $file_type_allow)) {
            $error["file_upload"] = "Chỉ cho upload file ảnh có đuôi jpg,png,jpeg,gif";
        } else {
            $flag_1 = true;
        }
        // echo $target_file;

        #Kiểm tra và chuyển file từ bộ nhớ tạm lên server
        if (empty($error) && isset($flag_1)) {
            $file_upload_tmp_name = $_FILES['file_upload']['tmp_name'];
            move_uploaded_file($file_upload_tmp_name, $target_file);
        }
        if (empty($error)) {
            $creator = user_login();
            $data = array(
                'blog_title' =>  $blog_title,
                'content_demo' =>  $content_demo,
                'content' =>  $content,
                'thumb_main_blog' => 'admin/' . $target_file,
                'time' =>  $time,
                'creator' => $creator,
                'cat_blog_parent' => $parent_Cat,
                'status' => $status
            );
            $notify = array();
            $notify['success'] = "Đã thêm bài viết thành công 1 bài viết mới";
            db_insert('blog', $data);
        }
    }

    load_view('add_post', $data);
}



function add_catAction()
{
    if (isset($_POST['btn-submit'])) {
        global $error, $name_cat_blog, $time, $notify;
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $time = date("d/m/Y") . ' | ' . date('H:i');
        $creator = user_login();
        $error = array();
        if (empty($_POST['name_cat_blog'])) {
            $error['name_cat_blog'] = '(*)Không được để trống tên danh mục!';
        } else {
            $name_cat_blog = $_POST['name_cat_blog'];
        }
        if (empty($error)) {
            $data = array(
                'name_cat_blog' => $name_cat_blog,
                'creator' => $creator,
                'time' => $time
            );
            db_insert('tbl_cat_blog', $data);
            $notify['success'] = "Đã thêm 1 danh mục $name_cat_blog";
        }
    }
    load_view('add_cat');
}

function update_cat_blogAction()
{
    if (isset($_POST['btn-submit'])) {
        global $error;
        if (empty($_POST['name_cat_blog'])) {
            $error['name_cat_blog'] = "(*)Không được để trống tên danh mục!";
        } else {
            $name_cat_blog = $_POST['name_cat_blog'];
        }
        $id = $_GET['id'];
        if (empty($error)) {
            $data = array(
                'name_cat_blog' => $name_cat_blog,
            );
            db_update("tbl_cat_blog", $data, "`cat_id` = $id");
            redirect('?mod=post&action=list_cat');
        }
    }
    $id = $_GET['id'];
    $cat_blog = db_fetch_row("SELECT * FROM `tbl_cat_blog` WHERE `cat_id` = $id");
    $data['cat_blog'] = $cat_blog;
    load_view('update_post_cat', $data);
}

function delete_cat_blogAction()
{
    $id = $_GET['id'];
    db_delete('tbl_cat_blog', "`cat_id` = $id");
    redirect('?mod=post&action=list_cat');
}


function list_postAction()
{
    $list_blog = list_blog();
    $data['list_blog'] = $list_blog;
    load_view('list_post', $data);
}

function list_catAction()
{
    $list_cat_blog = list_cat_blog();;
    $data['list_cat_blog'] = $list_cat_blog;
    load_view('list_cat_post', $data);
}

function delete_blogAction()
{
    $id = $_GET['id'];
    db_delete('blog', "`id` = $id");
    redirect('?mod=post&action=list_post');
}

function update_blogAction()
{
    $id = $_GET['id'];
    $blog = db_fetch_row("SELECT * FROM `blog` WHERE `id` = $id");
    $data['blog'] = $blog;
    if (isset($_POST['btn_approve'])) {
        $data = array(
            'status' => 1,
        );
        db_update('blog', $data, "`id` = $id");
        redirect('?mod=post&action=list_post');
    }
    load_view('update_post', $data);
}
