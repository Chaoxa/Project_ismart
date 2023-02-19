<!DOCTYPE html>
<html>

<head>
    <meta property="og:image" content="http://tranquy.unitopcv.com/admin/public/uploads/Screenshot_20221026_122140.png" />
    <meta property="og:title" content="TQ STORE" />
    <title>ISMART STORE</title>
    <meta charset="UTF-8">
    <link rel="icon" href="https://noithattinnghia.com/wp-content/uploads/2019/03/cropped-icon-home-cam.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="public/css/bootstrap/bootstrap-theme.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    <link href="public/reset.css" rel="stylesheet" type="text/css" />
    <link href="public/css/carousel/owl.carousel.css" rel="stylesheet" type="text/css" />
    <link href="public/css/carousel/owl.theme.css" rel="stylesheet" type="text/css" />
    <link href="public/css/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="public/style.css" rel="stylesheet" type="text/css" />
    <link href="public/responsive.css" rel="stylesheet" type="text/css" />
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v15.0" nonce="gkhFT6ck"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <script src="public/js/elevatezoom-master/jquery.elevatezoom.js" type="text/javascript"></script>
    <script src="public/js/bootstrap/bootstrap.min.js" type="text/javascript"></script>
    <script src="public/js/carousel/owl.carousel.js" type="text/javascript"></script>
    <script src="public/js/main.js" type="text/javascript"></script>

    <link href="
    https://cdn.jsdelivr.net/npm/sweetalert2@11.7.1/dist/sweetalert2.min.css
    " rel="stylesheet" />
    <script src="
    https://cdn.jsdelivr.net/npm/sweetalert2@11.7.1/dist/sweetalert2.all.min.js
    "></script>
</head>

<body>
    <!-- Messenger Plugin chat Code -->
    <div id="fb-root"></div>

    <!-- Your Plugin chat code -->
    <div id="fb-customer-chat" class="fb-customerchat">
    </div>

    <script>
        var chatbox = document.getElementById('fb-customer-chat');
        chatbox.setAttribute("page_id", "150462905773130");
        chatbox.setAttribute("attribution", "biz_inbox");
    </script>

    <!-- Your SDK code -->
    <script>
        window.fbAsyncInit = function() {
            FB.init({
                xfbml: true,
                version: 'v16.0'
            });
        };

        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s);
            js.id = id;
            js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>
    <style>
        @import url("https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css");
    </style>
    <div id="site">
        <div id="container">
            <div id="header-wp">
                <div id="head-top" class="clearfix">
                    <div class="wp-inner">
                        <a href="" title="" id="payment-link" class="fl-left">Hình thức thanh toán</a>
                        <div id="main-menu-wp" class="fl-right">
                            <ul id="main-menu" class="clearfix">
                                <li>
                                    <a href="?page=home" title="">Trang chủ</a>
                                </li>
                                <li>
                                    <a href="?mod=category_product&action=home" title="">Sản phẩm</a>
                                </li>
                                <li>
                                    <a href="?mod=blog&action=blog" title="">Blog</a>
                                </li>
                                <?php function get_list_cat_page()
                                {
                                    $result = array();
                                    $list_cat_page_home = db_fetch_array('SELECT * FROM `tbl_cat_page` WHERE 1');
                                    foreach ($list_cat_page_home as $value) {
                                        $value['url'] = "?mod=page&action=detail_page&id={$value['cat_id']}";
                                        $result[] = $value;
                                    }
                                    return $result;
                                }
                                $list_cat_page_home = get_list_cat_page();
                                foreach ($list_cat_page_home as $value) { ?>
                                    <li>
                                        <a href="<?php echo $value['url'] ?>" title=""><?php echo $value['name_cat_page'] ?></a>
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <div id="head-body" class="clearfix">
                    <div class="wp-inner">
                        <style>
                            #logo h1 {
                                font-size: 30px;
                                font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;
                            }
                        </style>
                        <a href="?page=home" title="" id="logo" class="fl-left">
                            <h1><b class="text-danger">TQ</b> <b class="text-primary">Store</b></h1>
                        </a>
                        <div id="search-wp" class="fl-left">
                            <form method="POST" action="">
                                <input type="text" name="s" id="s" placeholder="Bạn muốn tìm gì?" class="img-rouded">
                                <button type="submit" name="sm-s" id="sm-s">Tìm kiếm</button>
                            </form>
                        </div>
                        <?php if (isset($_POST['sm-s']) && !empty($_POST['s'])) {
                            // show_array($_POST);
                            $search = $_POST['s'];
                            redirect("?mod=category_product&action=home&key=$search");
                        } ?>
                        <div id="action-wp" class="fl-right">
                            <div id="advisory-wp" class="fl-left d-flex mx-2">
                                <div> <button class="dark-mode toggle-icon" onclick="toggleDarkMode()"></button></div>
                                <img class="icon-phone" src="https://media1.giphy.com/media/mbW2nvTE0TUc5IgRMm/giphy.gif?cid=6c09b952zt437d67rjkizo3c18jt9vkq7zt9blk1l5bx6wxs&rid=giphy.gif&ct=s" alt="">
                                <div>
                                    <span class="title">Tư vấn (Quý)</span>
                                    <span class="phone">0375.284.572</span>
                                </div>
                            </div>
                            <div id="btn-respon" class="fl-right"><i class="fa fa-bars" aria-hidden="true"></i></div>
                            <a href="?mod=cart&action=show" title="giỏ hàng" id="cart-respon-wp" class="fl-right">
                                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                <span id="num">2</span>
                            </a>
                            <div id="cart-wp" class="fl-right">
                                <?php if (!empty($_SESSION['cart']['buy'])) {
                                    global $list_cart;
                                    $list_cart = array_slice($_SESSION['cart']['buy'], 0, 2);
                                    $num_cart = count($_SESSION['cart']['buy']);
                                }


                                ?>
                                <div id="btn-cart">
                                    <a href="?mod=cart&action=show"> <i class="fa fa-shopping-cart text-white" aria-hidden="true"></i></a>
                                    <span id="num" class="text-danger num_cart"><?php if (!empty($_SESSION['cart']['buy'])) {
                                                                                    echo $num_cart;
                                                                                } ?></span>
                                </div>
                                <?php if (!empty($_SESSION['cart']['buy'])) { ?>
                                    <div id="dropdown">
                                        <p class="desc">Có <span class="num_cart"><?php echo $num_cart ?></span> trong giỏ hàng</p>
                                        <ul class="list-cart">
                                            <?php foreach ($list_cart as $value) { ?>
                                                <li class="clearfix">
                                                    <a href="" title="" class="thumb fl-left">
                                                        <img src="<?php echo $value['thumb_main'] ?>" alt="">
                                                    </a>
                                                    <div class="info fl-right">
                                                        <a href="" title="" class="product-name"><?php echo $value['product_name'] ?></a>
                                                        <p class="price text-danger"><?php echo price($value['sub_total'], 'VNĐ') ?></p>
                                                        <p class="qty">Số lượng: <span><?php echo $value['qty'] ?></span></p>
                                                    </div>
                                                </li>
                                            <?php } ?>
                                        </ul>
                                        <div class="total-price clearfix">
                                            <p class="title fl-left">Tổng:</p>
                                            <p class="price fl-right"> <?php echo price($_SESSION['cart']['total']['total'], 'VNĐ') ?></p>
                                        </div>
                                        <dic class="action-cart clearfix">
                                            <a href="?mod=cart&action=show" title="Giỏ hàng" class="view-cart fl-left">Giỏ hàng</a>
                                            <a href="?mod=cart&action=checkout" title="Thanh toán" class="checkout fl-right">Thanh toán</a>
                                        </dic>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>