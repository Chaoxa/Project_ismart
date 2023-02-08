<!DOCTYPE html>
<html>

<head>
    <title>Admin ISMART</title>
    <meta charset="UTF-8">
    <link rel="icon" href="https://noithattinnghia.com/wp-content/uploads/2019/03/cropped-icon-home-cam.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    <link href="public/css/bootstrap/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="public/reset.css" rel="stylesheet" type="text/css" />
    <link href="public/css/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="public/style.css" rel="stylesheet" type="text/css" />
    <link href="public/responsive.css" rel="stylesheet" type="text/css" />

    <script src="public/js/jquery-2.2.4.min.js" type="text/javascript"></script>
    <script src="public/js/bootstrap/bootstrap.min.js" type="text/javascript"></script>
    <script src="public/js/plugins/Ckeditor/ckeditor/ckeditor.js" type="text/javascript"></script>
    <script src="public/js/main.js" type="text/javascript"></script>
</head>

<body>
    <div id="site">
        <div id="container">
            <div id="header-wp">
                <div class="wp-inner clearfix">
                    <a href="?mod=users&action=update" title="" id="logo" class="fl-left text-danger">ADMIN</a>
                    <ul id="main-menu" class="fl-left">
                        <li>
                            <a href="?mod=slider&action=list_slider" title="">Slider</a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="?mod=slider&action=add_slider" title="">Thêm mới</a>
                                </li>
                                <li>
                                    <a href="?mod=slider&action=list_slider" title="">Danh sách slider</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="?mod=post&action=list_post" title="">Bài viết</a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="?mod=post&action=add_post" title="">Thêm mới</a>
                                </li>
                                <li>
                                    <a href="?mod=post&action=list_post" title="">Danh sách bài viết</a>
                                </li>
                                <li>
                                    <a href="?mod=post&action=list_cat" title="">Danh mục bài viết</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="?mod=product&action=list_product" title="">Sản phẩm</a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="?mod=product&action=add_product" title="">Thêm mới</a>
                                </li>
                                <li>
                                    <a href="?mod=product&action=list_product" title="">Danh sách sản phẩm</a>
                                </li>
                                <li>
                                    <a href="?mod=product&action=cat_product" title="">Danh mục sản phẩm</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="?mod=sale&action=list_order" title="">Bán hàng</a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="?mod=sale&action=list_order" title="">Danh sách đơn hàng</a>
                                </li>
                                <li>
                                    <a href="?mod=sale&action=list_customer" title="">Danh sách khách hàng</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="" title="">Menu</a>
                        </li>
                    </ul>
                    <div id="dropdown-user" class="dropdown dropdown-extended fl-right">
                        <button class="dropdown-toggle clearfix" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                            <div id="thumb-circle-logo" class="fl-left">
                                <img src="<?php if (empty(info_user(user_login(), 'avt'))) {
                                                echo "https://c2.staticflickr.com/8/7628/27739307291_c43b62d5df_b.jpg";
                                            } else {
                                                echo info_user(user_login(), 'avt');
                                            } ?>">
                            </div>
                            <h3 id="account" class="fl-right"><?php echo user_login() ?></h3>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo "?mod=users&action=update" ?>" title="Thông tin cá nhân">Thông tin tài khoản</a></li>
                            <li><a href="<?php echo "?mod=users&action=update_avt" ?>">Đổi ảnh đại diện</a></li>
                            <li><a href="?mod=users&action=logout" title="Thoát">Đăng xuất</a></li>
                        </ul>

                    </div>
                </div>
            </div>