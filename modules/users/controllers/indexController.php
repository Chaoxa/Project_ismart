<?php

function construct()
{
    load_model('index');
    load('lib', 'validation_form');
}
function loginAction()
{
    load('helper', 'users');
    global $error, $password, $username;
    if (isset($_POST['btn-submit'])) {
        $error = array();
        if (empty($_POST['username'])) {
            $error['username'] = 'Không được để trống tên đăng nhập';
        } else {
            if (is_username()) {
                $username = $_POST['username'];
            } else {
                $error['username'] = 'Tên đăng nhập phải từ 6-32 kí tự và không có kí tự đặc biệt';
            }
        }
        if (empty($_POST['password'])) {
            $error['password'] = 'Không được để trống mật khẩu';
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
                redirect('?mod=home&controller=index&actiton=index');
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
    unset($_SESSION['cart']);

    header("location: ?mod=home&controller=index&action=index");
}

function regAction()
{
    global $error, $fullname, $password, $email, $username, $notify;
    if (isset($_POST['btn-submit'])) {
        $error = array();
        if (empty($_POST['fullname'])) {
            $error['fullname'] = 'Không được để trống tên';
        } else {
            $fullname = $_POST['fullname'];
        }
        if (empty($_POST['email'])) {
            $error['email'] = 'Không được để trống email';
        } else {
            $email = $_POST['email'];
        }
        if (empty($_POST['username'])) {
            $error['username'] = 'Không được để trống tên đăng nhập';
        } else {
            if (is_username()) {
                $username = $_POST['username'];
            } else {
                $error['username'] = 'Tên đăng nhập phải từ 6-32 kí tự và không có kí tự đặc biệt';
            }
        }
        if (empty($_POST['password'])) {
            $error['password'] = 'Không được để trống mật khẩu';
        } else {
            if (is_password()) {
                $password = $_POST['password'];
            } else {
                $error['password'] = 'Mật khẩu cần 6-32 kí tự và được viết hoa chữ cái đầu';
            }
        }

        if (empty($_POST['confirm-password'])) {
            $error['confirm-password'] = 'Không được để trống xác nhận mật khẩu';
        } else {
            if (is_password()) {
                $confirm_password = $_POST['confirm-password'];
            } else {
                $error['password'] = 'Mật khẩu cần 6-32 kí tự và được viết hoa chữ cái đầu';
            }
        }
        if (empty($error['password']) && empty($error['confirm-password'])) {
            if ($confirm_password != $password) {
                $error['confirm'] = 'Mật khẩu không khớp';
            }
        }
        if (user_exists($username, $email)) {
            $error['login'] = "Tài khoản đã tồn tại trong hệ thống";
        }

        if (empty($error)) {
            $token_active = md5($fullname . time());
            $data = array(
                'fullname' => $fullname,
                'email' => $email,
                'username' => $username,
                'password' => md5($password),
                'token_active' => $token_active
            );
            $id_insert = db_insert("guest", $data);
            if (isset($id_insert)) {
                $notify = array();
                $notify['add'] = "<div class = 'text-success'>Mã xác nhận được gửi về <a href ='https://mail.google.com/mail/u/0/?tab=rm#inbox'><b>Email</b></a> của bạn hãy vào xác nhận để hoàn tất đăng kí</div>";
            }

            load('lib', 'sendmail');
            $url_active = base_url("?mod=users&action=active&token=$token_active");

            $send_to_mail = $email;
            $send_to_fullname = $fullname;
            $subject = "Kích hoạt tài khoản";
            $content = "<p>Xin chào <b>$fullname</b> thân mến.</p><p>Hãy bấm vào ô xác nhận để kích hoạt tài khoản</p>
            <a href = '$url_active' style = 'padding:10px,20px; background: rgb(17, 255, 0); color:black ;border-radius: 0.2rem;' ><b>Xác nhận</b></a>
            <p>Nếu không phải bạn đăng kí tài khoản hãy bỏ qua bức thư này.</p>";
            send_mail($send_to_mail, $send_to_fullname, $subject, $content, $option = array());
        }
    }
    load_view('register');
}


function activeAction()
{
    global $username, $password;
    $url_login = base_url('?mod=users&controller=index&action=login');
    $token_active = $_GET['token'];
    if (check_token_active($token_active)) {
        $data = array(
            'is_active' => 1,
        );
        db_update("guest", $data, "`token_active` = '$token_active'");
        echo "Chúc mừng bạn đã kích hoạt tài khoản thành công";
        echo "<br>";
        echo "<a href = '$url_login' >Đăng nhập</a>";
    } else {
        echo "Yêu cầu kích hoạt không hợp lệ do tài khoản không tồn tại trong hệ thống hoặc đã kích hoạt trước đó.";
    }
}

function resetAction()
{
    if (isset($_POST['btn-submit'])) {
        global $error, $email,$notify;
        $error = array();
        if (empty($_POST['email'])) {
            $error['email'] = 'Không được để trống email!';
        } else {
            $email = $_POST['email'];
        // else {
        //     if (is_email()) {
        //         $email = $_POST['email'];
        //     } else {
        //         $error['email'] = 'Email không đúng định dạng';
        //     }
        // }
        if (!email_exists($email)) {
            $error['email_exists'] = "Email không tồn tại trong hệ thống";
        }
    }
        if (empty($error)) {
            $reset_token = md5($email . time());
            $data = array(
                'reset_token' => $reset_token
            );
            $check = update_reset_token($data, $email);
            if (isset($check)) {
                $notify = array();
                $notify['check_success'] = "<div class = 'text-success'>Mã xác nhận được gửi về <a href ='https://mail.google.com/mail/u/0/?tab=rm#inbox'><b>Email</b></a> của bạn hãy vào xác nhận để hoàn tất đổi mật khẩu</div>";
            }

            load('lib', 'sendmail');
            $link = base_url("?mod=users&controller=index&action=newpass&reset_token=$reset_token");

            $send_to_mail = $email;
            $send_to_fullname = "";
            $subject = "Lấy lại mật khẩu";
            $content = "<p>Hãy bấm xác nhận để được lấy lại mật khẩu</p><a href = '$link' style = 'padding:10px,20px; background: rgb(17, 255, 0); color:black ;border-radius: 0.2rem;' ><b>Xác nhận</b></a>
        <p>Nếu không phải bạn đăng kí tài khoản hãy bỏ qua bức thư này.</p>";
            send_mail($send_to_mail, $send_to_fullname, $subject, $content, $option = array());
            $notify = array();
            $notify['send-success'] = "Đã gửi mã xác nhận tới email của bạn."; 
        }
    }
    load_view('reset');
}


function newpassAction()
{
    global $error, $password, $confirm_password;
    $reset_token = $_GET['reset_token'];
    if (check_reset_token($reset_token)) {

        if (isset($_POST['btn-submit'])) {
            $error = array();
            if (empty($_POST['password'])) {
                $error['password'] = 'Không được để trống mật khẩu';
            } else {
                if (is_password()) {
                    $password = $_POST['password'];
                } else {
                    $error['password'] = 'Mật khẩu cần 6-32 kí tự và được viết hoa chữ cái đầu';
                }
            }

            if (empty($_POST['confirm-password'])) {
                $error['confirm-password'] = 'Không được để trống xác nhận mật khẩu';
            } else {
                if (is_password()) {
                    $confirm_password = $_POST['confirm-password'];
                } else {
                    $error['password'] = 'Mật khẩu cần 6-32 kí tự và được viết hoa chữ cái đầu';
                }
            }
            if (empty($error['password']) && empty($error['confirm-password'])) {
                if ($confirm_password != $password) {
                    $error['confirm'] = 'Mật khẩu không khớp';
                }
            }


            if (empty($error)) {
                $data = array(
                    'password' => md5($password),
                );
                update_password($data, $reset_token);
                redirect("?mod=users&action=resetsuccess");
            }
        }
    }
    load_view('newpass');
}

function resetsuccessAction(){
    // $token = $_GET['token'];
    // $users = db_fetch_row("SELECT * FROM `guest` WHERE `password` = '$token'");
    // show_array($users);
    load_view('resetsuccess');
}