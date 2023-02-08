<?php

function construct()
{
    load_model('team');
}

function list_adminAction()
{
    $data['list_admin'] = get_list_admin();
    load_view("list_admin", $data);
}

function add_accountAction()
{
    $avt = 'https://c2.staticflickr.com/8/7628/27739307291_c43b62d5df_b.jpg';
    $date = date("d/m/Y");
    global $error, $fullname, $usernamee, $email, $password, $confirm_password, $tel, $address, $control, $notify;
    if (isset($_POST['btn-submit'])) {
        $error = array();
        if (empty($_POST['fullname'])) {
            $error['fullname'] = 'Không được để trống tên!';
        } else {
            $fullname = $_POST['fullname'];
        }
        if (empty($_POST['control'])) {
            $error['control'] = 'Không được để trống quyền quản lý!';
        } else {
            $control = $_POST['control'];
        }
        if (empty($_POST['username'])) {
            $error['usernamee'] = 'Không được để trống tên đăng nhập!';
        } else {
            $usernamee = $_POST['username'];
        }
        if (empty($_POST['password'])) {
            $error['password'] = 'Không được để trống mật khẩu!';
        } else {
            $password = $_POST['password'];
        }
        if (empty($_POST['confirm-password'])) {
            $error['confirm-password'] = 'Không được để trống xác nhận mật khẩu!';
        } else {
            $confirm_password = $_POST['confirm-password'];
        }
        if (empty($_POST['email'])) {
            $error['email'] = 'Không được để trống email!';
        } else {
            $email = $_POST['email'];
        }
        if (empty($_POST['tel'])) {
            $error['tel'] = 'Không được để trống số điện thoại!';
        } else {
            if (is_tel()) {
                $tel = $_POST['tel'];
            } else {
                $error['tel'] = 'Số điện thoại không đúng định dạng!';
            }
        }
        if (empty($_POST['address'])) {
            $error['address'] = 'Không được để trống địa chỉ!';
        } else {
            $address = $_POST['address'];
        }
        if (user_exists($usernamee)) {
            $error['login'] = "Tài khoản đã tồn tại trong hệ thống";
        }
        if (empty($error['password']) && empty($error['confirm-password'])) {
            if ($confirm_password != $password) {
                $error['confirm'] = 'Mật khẩu xác nhận không khớp';
            }
        }
        // show_array($error);
        $username = user_login();
        if (empty($error)) {
            $data = array(
                'fullname' => $fullname,
                'control' => $control,
                'username' => $usernamee,
                'email' => $email,
                'tel' => $tel,
                'address' => $address,
                'date_reg' => $date,
                'password' => md5($password),
                'avt' => $avt,
                'creator' => $username
            );
            add_user_login(user_login(), $data);
            $notify = array();
            $notify['add_success'] = "Đã thêm admin thành công";
        }
    }
    load_view('add_account');
}

function delete_user_loginAction()
{
    $id = $_GET['id'];
    delete_user_login($id);
    redirect("?mod=users&controller=team&action=list_admin");
}

function update_user_loginAction()
{
    $id = $_GET['id'];
    global $error, $fullname, $email, $notify;
    if (isset($_POST['btn-submit'])) {
        $error = array();
        if (empty($_POST['fullname'])) {
            $error['fullname'] = 'Không được để trống tên!';
        } else {
            $fullname = $_POST['fullname'];
        }
        if (empty($_POST['email'])) {
            $error['email'] = 'Không được để trống email!';
        } else {
            $email = $_POST['email'];
        }
        if (empty($_POST['tel'])) {
            $error['tel'] = 'Không được để trống số điện thoại!';
        } else {
            if (is_tel()) {
                $tel = $_POST['tel'];
            } else {
                $error['tel'] = 'Số điện thoại không đúng định dạng!';
            }
        }
        if (empty($_POST['address'])) {
            $error['address'] = 'Không được để trống địa chỉ!';
        } else {
            $address = $_POST['address'];
        }
        if (empty($error)) {
            $data = array(
                'fullname' => $fullname,
                'email' => $email,
                'tel' => $tel,
                'address' => $address
            );
            $notify = array();
            $notify['update_success'] = "Đã cập nhập thành công";
            update_user_login($data, $id);
        }
    }
    $dulieu['item'] = get_user_by_username($id);
    load_view('update', $dulieu);
}

function resetAction()
{
    echo 'hello';
    load_view('reset');
}
