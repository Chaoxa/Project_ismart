<?php

function construct()
{
    load_model('index');
}
function loginAction()
{
    global $error, $password, $username;
    if (isset($_POST['btn-submit'])) {
        $error = array();
        if (empty($_POST['username'])) {
            $error['username'] = 'Không được để trống tên đăng nhập!';
        } else {
            if (is_username()) {
                $username = $_POST['username'];
            } else {
                $error['username'] = 'Tên đăng nhập phải từ 6-32 kí tự và không có kí tự đặc biệt';
            }
        }
        if (empty($_POST['password'])) {
            $error['password'] = 'Không được để trống mật khẩu!';
        } else {
            if (is_password()) {
                $password = $_POST['password'];
            } else {
                $error['password'] = 'Mật khẩu cần 6-32 kí tự và được viết hoa chữ cái đầu';
            }
        }
        if (empty($error)) {
            if (isset($_POST['remember_me'])) {
                setcookie('is_login', true, time() + 3600);
                setcookie('user_login', $username, time() + 3600);
            }
            if (check_login($username, $password)) {
                $_SESSION['is_login'] = true;
                $_SESSION['user_login'] = $username;
                redirect("?mod=sale&action=list_order");
            } else {
                $error['login'] = 'Tài khoản hoặc mật khẩu không chính xác';
            }
        }
    }
    load_view('login');
};

function logoutAction()
{
    // setcookie('is_login',true,time()-3600);
    // setcookie('user_login',$username,time()-3600);
    unset($_SESSION['is_login']);
    unset($_SESSION['user_login']);

    header("location: ?mod=users&action=login");
}
function updateAction()
{
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
            update_user_login(user_login(), $data);
        }
    }
    $dulieu['item'] = get_user_by_username(user_login());
    load_view('update', $dulieu);
}

function change_passAction()
{
    global $old_pass, $error, $password, $confirm_password, $notify;
    if (isset($_POST['btn-submit'])) {
        $error = array();
        $notify = array();
        if (empty($_POST['old-pass'])) {
            $error['old-pass'] = 'Không được để trống mật khẩu!';
        } else {
            if (is_password()) {
                $old_pass = $_POST['old-pass'];
            } else {
                $error['old-pass'] = 'Mật khẩu cần 6-32 kí tự và được viết hoa chữ cái đầu';
            }
        }
        if (empty($_POST['password'])) {
            $error['password'] = 'Không được để trống mật khẩu mới!';
        } else {
            if (is_password()) {
                $password = $_POST['password'];
            } else {
                $error['password'] = 'Mật khẩu cần 6-32 kí tự và được viết hoa chữ cái đầu';
            }
        }

        if (empty($_POST['confirm-password'])) {
            $error['confirm-password'] = 'Không được để trống xác nhận mật khẩu!';
        } else {
            if (is_password()) {
                $confirm_password = $_POST['confirm-password'];
            } else {
                $error['confirm-password'] = 'Mật khẩu cần 6-32 kí tự và được viết hoa chữ cái đầu';
            }
        }

        if (empty($error['password']) && empty($error['confirm-password'])) {
            if ($confirm_password != $password) {
                $error['confirm'] = 'Mật khẩu không khớp';
            }
        }

        if (empty($error)) {
            if (check_pass($old_pass, user_login())) {
                $data = array(
                    'password' => md5($password)
                );
                $notify['success'] = 'Đổi mật khẩu thành công!';
                update_user_login(user_login(), $data);
            } else {
                $notify['false'] = "Mật khẩu không đúng!";
            }
        }
    }
    load_view('change_pass');
}

function update_avtAction()
{
    if (isset($_POST['btn-submit'])) {
        global $error, $notify;
        $error = array();
        if (empty($_FILES['file_upload']['name'])) {
            $error["file_upload"] = "Không được để trống ảnh!";
        } else {
            $file_upload_name = $_FILES['file_upload']['name'];
            #Tạo đường dẫn file chứa images
            $target_dir = "public/uploads/";
            #Tạo đường dẫn file sau khi upload lên hệ thống
            $target_file = $target_dir . $file_upload_name;
            // echo $target_file;

            #Kiểm tra điều kiện upload
            //1.Kiểm tra loại kích thước
            //2.Kiểm tra loại file
            //3.Kiểm tra sự tồn tại của file

            #Kiểm tra kích thước
            $file_upload_size = $_FILES['file_upload']['size'];
            if ($file_upload_size > 5242880) {
                $error["file_upload"] = "Kích thước file không được vượt quá 5MB";
            }
            // show_array($error);


            #Kiểm tra loại file 
            //Lấy đuôi pathinfo
            $file_type = pathinfo($file_upload_name, PATHINFO_EXTENSION);

            // show_array($file_type);
            //Tạo mảng có pathinfo cho phép 
            $file_type_allow = array('jpg', 'png', 'jpeg', 'gif');
            if (!in_array(strtolower($file_type), $file_type_allow)) {
                $error["file_upload"] = "Chỉ cho upload file ảnh có đuôi jpg,png,jpeg,gif";
            }


            // #Kiểm tra sự tồn tại của file trên hệ thống
            // // show_array($target_file);

            // if (file_exists($target_file)) {
            //     $error['file_upload'] = "File đã tồn tại trên hệ thống!";
            // }


            #Kiểm tra và chuyển file từ bộ nhớ tạm lên server
            if (empty($error)) {
                $file_upload_tmp_name = $_FILES['file_upload']['tmp_name'];


                if (move_uploaded_file($file_upload_tmp_name, $target_file)) {
                    $data = array(
                        'avt' => "public/uploads/$file_upload_name"
                    );
                    $username = user_login();
                    db_update('guest', $data, "username = '$username'");
                    $notify['success'] = "Bạn đã cập nhật ảnh đại diện thành công!";
                } else {
                    echo "Bạn đã upload thất bại";
                };
            }
        }
    }
    load_view('up_avt');
}
