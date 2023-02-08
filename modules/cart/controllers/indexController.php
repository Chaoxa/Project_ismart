<?php

function construct()
{
    //    echo "DÙng chung, load đầu tiên";
    load_model('index');
    load('lib', 'validation_form');
}

function showAction()
{
    $list_cart = get_list_by_cart();
    // show_array($list_cart);
    $data['list_cart'] = $list_cart;
    load_view('index', $data);
}

function add_cartAction()
{
    $id = $_POST['id'];
    add_cart($id);
    global $list_cart;
    $list_cart = $_SESSION['cart']['buy'];
    $num_cart = count($list_cart);
    $data = array(
        'num_cart' => $num_cart,
        'list_cart' => $list_cart,
    );
    echo json_encode($data);
}

function buy_nowAction()
{
    $id = $_GET['id'];
    add_cart($id);
    redirect("?mod=cart&action=show");
}



function deleteAction()
{
    $id = $_GET['id'];
    if (isset($_SESSION['cart'])) {
        unset($_SESSION['cart']['buy'][$id]);
        update_cart();
    }
    redirect("?mod=cart&action=show");
}


function delete_allAction()
{
    unset($_SESSION['cart']);
    redirect("?mod=cart&controller=index&action=show");
}

function update_ajaxAction()
{
    $id = $_POST['id'];
    $qty = $_POST['qty'];

    $item = get_detail_product($id);
    if (isset($_SESSION['cart']) && array_key_exists($id, $_SESSION['cart']['buy'])) {

        $_SESSION['cart']['buy'][$id]['qty'] = $qty;
        $sub_total = $qty * $item['new_price'];
        $_SESSION['cart']['buy'][$id]['sub_total'] = $sub_total;

        update_cart();
        $total = get_total_cart();


        $data = array(
            'sub_total' => price($sub_total, 'VNĐ'),
            'total' => price($total, 'VNĐ'),
        );
        echo json_encode($data);
        // echo $sub_total;
    }
}
function checkoutAction()
{
    if (isset($_POST['order-now'])) {
        global $error, $creator, $time, $fullname, $email, $address, $phone, $payment_methods, $note;
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $time = date("d/m/Y") . ' | ' . date('H:i');
        $day = date('d');
        $month = date('m');
        $year = date('Y');
        $day = $day + 3;
        $estimated_time = "$day/$month/$year";
        $code_bill = 'bill#' . date("His");
        $creator = user_login();
        $error = array();
        if (empty($_POST['fullname'])) {
            $error['fullname'] = '(*)Không được để trống tên!';
        } else {
            $fullname = $_POST['fullname'];
        }
        if (!empty($_POST['email'])) {
            $email = $_POST['email'];
        } else {
            $email = '';
        }
        if (empty($_POST['address'])) {
            $error['address'] = '(*)Không được để trống địa chỉ!';
        } else {
            $address = $_POST['address'];
        }
        if (empty($_POST['phone'])) {
            $error['phone'] = '(*)Không được để trống số điện thoại!';
        } else {
            $phone = $_POST['phone'];
        }
        if (!empty($_POST['payment_method'])) {
            $payment_methods = $_POST['payment_method'];
        }
        if (!empty($_POST['note'])) {
            $note = $_POST['note'];
        }
        setcookie('fullname', $fullname, time() + (86400 * 30), "/");
        setcookie('email', $email, time() + (86400 * 30), "/");
        setcookie('address', $address, time() + (86400 * 30), "/");
        setcookie('phone', $phone, time() + (86400 * 30), "/");
        if (empty($error)) {
            $cart_json = json_encode($_SESSION['cart']['buy']);
            $data = array(
                'fullname' => $fullname,
                'email'   => $email,
                'address' => $address,
                'phone' => $phone,
                'method_pay' => $payment_methods,
                'note' => $note,
                'time' => $time,
                'product' => $cart_json,
                'code_bill' => $code_bill
            );
            $_SESSION['bill'] = array(
                'fullname' => $fullname,
                'email'   => $email,
                'address' => $address,
                'phone' => $phone,
                'method_pay' => $payment_methods,
                'note' => $note,
                'time' => $time,
                'product' => $cart_json,
                'estimated_time' => $estimated_time
            );
            db_insert('tbl_order', $data);

            load('lib', 'sendmail');
            $send_to_mail = $_POST['email'];
            $send_to_fullname = $_POST['fullname'];
            $subject = "Tin nhắn này được gửi tự động từ Trần Quý";
            $content = "<div>Chúc mừng <strong> $_POST[fullname] </strong> bạn đã đặt hàng thành công.</div>
            <table border = '1' style = 'margin-bottom:10px'>
            <thead>
                <tr style = 'background: black ; color: white ;'>
                    <td style='padding: 10px'>STT</td>
                    <td style='padding: 10px'>Ảnh</td>
                    <td style='padding: 10px'>Tên sản phẩm</td>
                    <td style='padding: 10px'>Giá tiền</td>
                    <td style='padding: 10px'>Số lượng</td>
                    <td style='padding: 10px'>Tổng</td>
                </tr>
            </thead>
            <tbody>
                <td style='padding: 10px'>1</td>
                <td style='padding: 10px'><img src='https://cdn.tgdd.vn/Products/Images/42/240259/s16/iPhone-14-thumb-topzone%20(2)-650x650.png' alt='' style = 'width: 80px'></td>
                <td style='padding: 10px'>IPhone 14 Pro Max</td>
                <td style='padding: 10px'>29,065,000 VNĐ</td>
                <td style='padding: 10px'>1</td>
                <td style='padding: 10px'><span style = 'color: red' >29,065,000 VNĐ</span></div></td>
            </tbody>
        </table>
        <div>Mọi thắc mắc xin vui lòng liên hệ đến SDT: <span style = 'color: red' >0375284572</span></div>
    
                ";
            $admin_send_to_mail = 'tranquy52003@gmail.com';
            $admin_subject = "Chúc mừng bạn vừa có một đơn hàng mới đến từ $_POST[fullname]";
            $admin_content = "<div>Chúc mừng bạn vừa có một đơn hàng mới đến từ <strong> $_POST[fullname] </strong>.</div>
            <table border = '1' style = 'margin-bottom:10px'>
            <thead>
                <tr style = 'background: black ; color: white ;'>
                    <td style='padding: 10px'>STT</td>
                    <td style='padding: 10px'>Ảnh</td>
                    <td style='padding: 10px'>Tên sản phẩm</td>
                    <td style='padding: 10px'>Giá tiền</td>
                    <td style='padding: 10px'>Số lượng</td>
                    <td style='padding: 10px'>Tổng</td>
                </tr>
            </thead>
            <tbody>
                <td style='padding: 10px'>1</td>
                <td style='padding: 10px'><img src='https://cdn.tgdd.vn/Products/Images/42/240259/s16/iPhone-14-thumb-topzone%20(2)-650x650.png' alt='' style = 'width: 80px'></td>
                <td style='padding: 10px'>IPhone 14 Pro Max</td>
                <td style='padding: 10px'>29,065,000 VNĐ</td>
                <td style='padding: 10px'>1</td>
                <td style='padding: 10px'><span style = 'color: red' >29,065,000 VNĐ</span></div></td>
            </tbody>
        </table>
        <div>Mọi thắc mắc xin vui lòng liên hệ đến SDT: <span style = 'color: red' >0375284572</span></div>
    
                ";
            if (!empty($email)) {
                send_mail($send_to_mail, $send_to_fullname, $subject, $content, $option = array());
            }
            send_mail($admin_send_to_mail, $send_to_fullname, $admin_subject, $admin_content, $option = array());
            redirect('?mod=cart&action=success_order');
        }
    }
    global $fullname, $email, $address, $phone;
    if (!empty($_COOKIE['fullname'])) {
        $fullname = $_COOKIE['fullname'];
    }
    if (!empty($_COOKIE['email'])) {
        $email = $_COOKIE['email'];
    }
    if (!empty($_COOKIE['address'])) {
        $address = $_COOKIE['address'];
    }
    if (!empty($_COOKIE['phone'])) {
        $phone = $_COOKIE['phone'];
    }
    // echo $fullname;
    $list_product = $_SESSION['cart']['buy'];
    $data['list_product'] = $list_product;
    // show_array($list_product);
    load_view('checkout', $data);
}

function success_orderAction()
{
    $bill = $_SESSION['bill'];
    // show_array($bill);
    $data['bill'] = $bill;
    load_view('success_order', $data);
}
