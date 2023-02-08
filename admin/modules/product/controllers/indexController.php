<?php

function construct()
{
    load_model('index');
}

function add_productAction()
{
    // show_array($_POST);
    // show_array($_FILES);
    global $time, $error, $creator, $notify, $product_name, $old_price, $cat_id, $amount, $featured_products, $discount, $new_price, $desc, $detail, $parent_id, $status, $target_file;
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $time = date("d/m/Y") . ' | ' . date('H:i');
    $creator = user_login();
    if (isset($_POST['btn-submit'])) {
        $error = array();
        $product_code = 'uni#' . date("His");
        if (empty($_POST['product_name'])) {
            $error['product_name'] = '(*)Không được để trống tên sản phẩm!';
        } else {
            $product_name = $_POST['product_name'];
        }
        if (empty($_POST['old_price'])) {
            $error['old_price'] = '(*)Không được để trống giá tiền!';
        } else {
            $old_price = $_POST['old_price'];
        }
        if (!empty($_POST['discount'])) {
            $discount = $_POST['discount'];
        } else {
            $discount = '';
        }
        if (!empty($_POST['new_price'])) {
            $new_price = $_POST['new_price'];
        } else {
            $error['new_price'] = '(*)Không được để trống thành tiền!';
        }
        if (empty($_POST['amount'])) {
            $error['amount'] = '(*)Không được để trống số lượng!';
        } else {
            $amount = $_POST['amount'];
        }
        if (!empty($_POST['featured_products'])) {
            $featured_products = 1;
        } else {
            $featured_products = 0;
        }
        if (empty($_POST['desc'])) {
            $error['desc'] = '(*)Không được để trống mô tả ngắn!';
        } else {
            $desc = $_POST['desc'];
        }
        if (empty($_POST['detail'])) {
            $error['detail'] = '(*)Không được để trống chi tiết sản phẩm!';
        } else {
            $detail = $_POST['detail'];
        }
        if (empty($_POST['cat_id'])) {
            $error['cat_id'] = '(*)Không được để trống danh mục sản phẩm sản phẩm!';
        } else {
            $cat_id = $_POST['cat_id'];
        }
        if (empty($_POST['status'])) {
            $error['status'] = '(*)Không được để trống trạng thái!';
        } else {
            $status = $_POST['status'];
        }


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


        #Upload image detail
        // show_array($_FILES);
        if (empty($_FILES['files']['name'][0])) {
            $error['file_upload_detail'] = '(*)Không được để trống ảnh chi tiết!';
        } else {
            $list_target_file = array();
            $list_file_upload_name = $_FILES['files']['name'];
            // show_array($list_file_upload_name);
            foreach ($list_file_upload_name as $value) {
                #Tạo đường dẫn file chứa images
                $target_dir = "public/uploads/";
                #Tạo đường dẫn file sau khi upload lên hệ thống
                $list_target_file[] = $target_dir . $value;
            }
            // show_array($target_file);


            #Kiểm tra kích thước
            global $temp;
            $temp = 0;
            $list_file_upload_size = $_FILES['files']['size'];
            foreach ($list_file_upload_size as $value) {
                $temp++;
                if ($value > 5242880) {
                    $error["file_upload_size_$temp"] = "Kích thước file $value không được vượt quá 5MB";
                }
            }
            // show_array($error);


            #Kiểm tra loại file 
            // Lấy đuôi pathinfo
            $file_type = array();
            foreach ($list_file_upload_name as $value) {
                $file_type[] = pathinfo($value, PATHINFO_EXTENSION);
            }
            // show_array($file_type);
            // Tạo mảng có pathinfo cho phép 
            $file_type_allow = array('jpg', 'png', 'jpeg', 'gif');
            foreach ($file_type as $value) {
                $temp++;
                if (!in_array(strtolower($value), $file_type_allow)) {
                    $error["file_upload_$temp"] = "Chỉ cho upload file ảnh có đuôi jpg,png,jpeg,gif";
                }
            }

            #Kiểm tra sự tồn tại của file trên hệ thống
            // show_array($list_target_file);
            foreach ($list_target_file as $value) {
                if (file_exists($value)) {
                    $error['file_upload_detail'] = "File $value đã tồn tại trên hệ thống!";
                    break;
                }
            }

            #Kiểm tra và chuyển file từ bộ nhớ tạm lên server
            if (empty($error) && isset($flag_1)) {
                $file_upload_tmp_name = $_FILES['file_upload']['tmp_name'];
                move_uploaded_file($file_upload_tmp_name, $target_file);

                $list_file_upload_tmp_name = $_FILES['files']['tmp_name'];
                // show_array($list_file_upload_tmp_name);
                $temp = -1;
                foreach ($list_file_upload_tmp_name as $value) {
                    $temp++;
                    if (move_uploaded_file($value, $list_target_file[$temp])) {
                        $flag_2 = true;
                    } else {
                        echo "Bạn đã upload thất bại";
                    };
                }
            }
        }
        if (!empty($list_file_upload_name)) {
            $result = array();
            foreach ($list_file_upload_name as $value) {
                $result[] = "admin/public/uploads/$value";
            }
            $thumb_detail = json_encode($result);
        }
        // echo $thumb_detail;
        if (empty($error) && isset($flag_1) && isset($flag_2)) {
            $parent_id = get_parent_product_by_id($cat_id);
            $data = array(
                'product_name' => $product_name,
                'product_code' => $product_code,
                'old_price' => $old_price,
                'discount' => $discount,
                'new_price' => $new_price,
                'product_desc' => $desc,
                'product_detail' => $detail,
                'cat_id' => $cat_id,
                'parent_id' => $parent_id,
                'amount' => $amount,
                'featured_products' => $featured_products,
                'status' => $status,
                'thumb_main' => "admin/public/uploads/$file_upload_name",
                'thumb_detail' => $thumb_detail,
                'time' => $time,
                'creator' => $creator
            );
            $notify = array();
            $notify['update_success'] = "Đã thêm sản phẩm thành công!";
            db_insert('tbl_product', $data);
        }
    }
    $list_cat_parent = db_fetch_array('SELECT * FROM `tbl_cat_parent_product`');
    // show_array($list_cat_parent);

    $data['list_cat_parent'] = $list_cat_parent;
    load_view('add_product', $data);
}

function add_cat_productAction()
{
    global $error, $title, $parent_cat, $notify;
    $error = array();
    // show_array($_POST);
    if (isset($_POST['btn-submit'])) {
        if (empty($_POST['title'])) {
            $error['title'] = "(*)Không được để trống tên danh mục!";
        } else {
            $title = $_POST['title'];
        }
        if (empty($_POST['parent-Cat'])) {
            $error['parent-Cat'] = "(*)Không được để trống tên danh mục!";
        } else {
            $parent_cat = $_POST['parent-Cat'];
        }
        if (empty($error)) {
            $data = array(
                'cat_title' => $title,
                'parent_id' => $parent_cat
            );
            db_insert('tbl_cat_product', $data);
            $notify['success'] = 'Đã thêm danh mục thành công.';
        }
    }

    $list_parent_cat = db_fetch_array('SELECT * FROM `tbl_cat_parent_product`');
    $data['list_parent_cat'] = $list_parent_cat;
    load_view('add_cat', $data);
}

#Danh sách các danh mục sản phẩm
function cat_productAction()
{
    $list_cat_product = db_fetch_array('SELECT * FROM `tbl_cat_product` WHERE 1');
    $data['list_cat_product'] = $list_cat_product;
    load_view('cat_product', $data);
}

#Danh sách sản phẩm
function list_productAction()
{
    $list_product = get_list_product();
    $data['list_product'] = $list_product;
    load_view('list_product', $data);
}

function update_productAction()
{
    $id = $_GET['id'];
    $product = db_fetch_row("SELECT * FROM `tbl_product` WHERE `id` = $id");
    $list_cat_parent = db_fetch_array('SELECT * FROM `tbl_cat_parent_product`');
    if (isset($_POST['btn-submit'])) {
        global $error, $product_name, $old_price, $cat_id, $amount, $featured_products, $discount, $new_price, $desc, $detail, $parent_id, $status, $target_file;

        $error = array();
        if (empty($_POST['product_name'])) {
            $error['product_name'] = '(*)Không được để trống tên sản phẩm!';
        } else {
            $product_name = $_POST['product_name'];
        }
        if (empty($_POST['old_price'])) {
            $error['old_price'] = '(*)Không được để trống giá tiền!';
        } else {
            $old_price = $_POST['old_price'];
        }
        if (!empty($_POST['discount'])) {
            $discount = $_POST['discount'];
        } else {
            $discount = '';
        }
        if (!empty($_POST['new_price'])) {
            $new_price = $_POST['new_price'];
        } else {
            $error['new_price'] = '(*)Không được để trống thành tiền!';
        }
        if (empty($_POST['amount'])) {
            $error['amount'] = '(*)Không được để trống số lượng!';
        } else {
            $amount = $_POST['amount'];
        }
        if (!empty($_POST['featured_products'])) {
            $featured_products = 1;
        } else {
            $featured_products = 0;
        }
        if (empty($_POST['desc'])) {
            $error['desc'] = '(*)Không được để trống mô tả ngắn!';
        } else {
            $desc = $_POST['desc'];
        }
        if (empty($_POST['detail'])) {
            $error['detail'] = '(*)Không được để trống chi tiết sản phẩm!';
        } else {
            $detail = $_POST['detail'];
        }
        if (empty($_POST['cat_id'])) {
            $error['cat_id'] = '(*)Không được để trống danh mục sản phẩm sản phẩm!';
        } else {
            $cat_id = $_POST['cat_id'];
        }
        if (empty($_POST['status'])) {
            $error['status'] = '(*)Không được để trống trạng thái!';
        } else {
            $status = $_POST['status'];
        }
        if (empty($error)) {
            $data = array(
                'product_name' => $product_name,
                'old_price' => $old_price,
                'discount' => $discount,
                'new_price' => $new_price,
                'product_desc' => $desc,
                'product_detail' => $detail,
                'cat_id' => $cat_id,
                'amount' => $amount,
                'featured_products' => $featured_products,
                'status' => $status,
            );
            db_update('tbl_product', $data, "`id` = $id");
            redirect('?mod=product&action=list_product');
        }
    }
    $data['product'] = $product;
    $data['list_cat_parent'] = $list_cat_parent;

    load_view('update_product', $data);
}

function temporary_deleteAction()
{
    $id = $_GET['id'];
    $data = array(
        "temporary_delete" => 1
    );
    db_update('tbl_product', $data, "`id` = $id");
    redirect('?mod=product&action=list_product');
}

function restoreAction()
{
    $id = $_GET['id'];
    $data = array(
        "temporary_delete" => 0
    );
    db_update('tbl_product', $data, "`id` = $id");
    redirect('?mod=product&action=garbage_product');
}

function delete_productAction()
{
    $id = $_GET['id'];
    db_delete("tbl_product", "`id`=$id");
    redirect('?mod=product&action=garbage_product');
}

function garbage_productAction()
{
    $list_product = get_list_product("`temporary_delete` = '1'");
    $data['list_product'] = $list_product;
    load_view('garbage', $data);
}
