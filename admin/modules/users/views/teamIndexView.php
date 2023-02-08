<?php
get_header() ?>
<?php
// $list_user = db_fetch_array("SELECT * FROM `tbl_users`");
//đếm só lượng trong tác vụ
$total_row = db_num_rows("SELECT * FROM `tbl_users`");
$num_rows = db_num_rows("SELECT * FROM `tbl_users`");


# SỐ BÀI ĐÃ ĐĂNG
$number_posted = db_num_rows("SELECT * FROM `tbl_users` WHERE `actions`= 'Phê duyệt'");
# chờ sét duyệt
$number_waiting = db_num_rows("SELECT * FROM `tbl_users` WHERE `actions` = 'Chờ duyệt'");
# SỐ SẢN PHẨM ĐÃ XÓA
$delete = db_num_rows("SELECT * FROM `tbl_users` WHERE `actions` = 'Thùng rác'");
// số lượng bản ghi trên trang 
// $num_per_page = 5;
// //tổng bản ghi
// $total_rows = $num_rows;

// //tổng trang
// $num_page = ceil($total_rows/$num_per_page);
// // echo "số trang: {$num_page} <br>" ;

// $page = isset($_GET['page'])?(int)$_GET['page']:1;
// $start = ($page-1)*$num_per_page;
// // echo "trang: {$page} <br>" ;
// // echo "xuất phát: {$start} <br>" ;
// $list_user = get_user($start, $num_per_page);




?>

<div id="main-content-wp" class="list-post-page">
    <div class="section" id="title-page">
        <div class="clearfix">
            <a href="?mod=users&controller=team&action=add_cat" title="" id="add-new" class="fl-left">Thêm mới</a>
            <h3 id="index" class="fl-left">Nhóm Quản Trị</h3>
        </div>
    </div>
    <div class="wrap clearfix">
        <?php get_sidebar('users'); ?>
        <div id="content" class="fl-right">
            <?php if (!empty($list_user)) {
            ?>

                <div class="section" id="detail-page">
                    <div class="section-detail">
                        <div class="filter-wp clearfix">
                            <ul class="post-status fl-left">
                                <li class="all"><a href="">Tất cả <span class="count">(<?php echo $total_row; ?>)</span></a> |</li>
                                <li class="publish"><a href="">Đã duyệt <span class="count">(<?php echo $number_posted; ?>)</span></a> |</li>
                                <li class="pending"><a href="">Chờ xét duyệt <span class="count">(<?php echo $number_waiting; ?>)</span></a></li>
                                <li class="trash"><a href="">Thùng rác <span class="count">(<?php echo $delete; ?>)</span></a></li>
                            </ul>
                            <form method="POST" action="" class="form-s fl-right">
                                <input type="text" name="s" id="s">
                                <input type="submit" name="sm_s" value="Tìm kiếm">
                                <?php echo form_error('search')?>
                            </form>
                        </div>
                        <form method="POST" action="" class="form-actions">
                            <div class="actions">

                                <select name="actions">
                                    <option value="0">Tác vụ</option>
                                    <option <?php if (!empty($_POST['actions']) && $_POST['actions'] == 1) echo "selected='selected'"; ?> value="1">Phê Duyệt</option>
                                    <option <?php if (!empty($_POST['actions']) && $_POST['actions'] == 2) echo "selected='selected'"; ?> value="2">Chờ Duyệt</option>
                                    <option <?php if (!empty($_POST['actions']) && $_POST['actions'] == 3) echo "selected='selected'"; ?> value="3">Bỏ vào thùng rác</option>
                                </select>
                                <input type="submit" name="sm_action" value="Áp dụng">
                            </div>
                            <div class="table-responsive">
                                <table class="table list-table-wp">
                                    <thead>
                                        <tr>
                                            <td><input type="checkbox" name="checkAll" id="checkAll"></td>
                                            <td><span class="thead-text">STT</span></td>
                                            <td><span class="thead-text">Ảnh đại diện</span></td>
                                            <td><span class="thead-text">Họ và tên</span></td>
                                            <td><span class="thead-text">Số điện thoại</span></td>
                                            <td><span class="thead-text">Email</span></td>
                                            <td><span class="thead-text">Địa chỉ</span></td>
                                            <td><span class="thead-text">Trạng thái</span></td>
                                            <td><span class="thead-text">Thời gian</span></td>
                                            <td><span class="thead-text">Phân quyền</span></td>
                                            <td><span class="thead-text">Sửa|Xóa</span></td>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        $temp = 0;
                                        foreach ($list_user as $user) {
                                            $temp++;
                                        ?>
                                            <tr>
                                                <td><input type="checkbox" name="checkItem[<?php echo $user['user_id'] ?>]" class="checkItem" value="<?php echo $user['user_id'] ?>"> </td>
                                                <td><span class="tbody-text"><?php echo $temp; ?></h3></span>
                                                <td class="clearfix">
                                                    <div class="tb-title fl-left">
                                                        <a href=""> <img class="avatar" style="width: 95px; height: 53px;" src="<?php echo $user['avatar'] ?>" alt=""> </a>
                                                    </div>

                                                </td>
                                                <td><span class="tbody-text"><?php echo $user['fullname'] ?></span></td>
                                                <td><span class="tbody-text"><?php echo $user['phone_number'] ?></span></td>
                                                <td><span class="tbody-text"><?php echo $user['email'] ?></span></td>
                                                <td><span class="tbody-text"><?php echo $user['adress'] ?></span></td>
                                                <td><span style="<?php echo color_text($user['actions']) ?>" class="tbody-text"><?php echo $user['actions'] ?></span></td>
                                                <!-- <?php //if(!empty($user_posted)) return class = ""
                                                        ?> -->
                                                <td><span class="tbody-text"><?php echo  date("d/m/Y-h:m:s", $user['created_date']) ?></span></td>
                                                <td><span class="tbody-text">Toàn quyền</span></td>
                                                <td class="clearfix">
                                                    <ul class="list-operation fl-right">
                                                        <li><a href="?mod=users&controller=team&action=teamUpdate&user_id=<?php echo $user['user_id'] ?>" title="Sửa" class="edit"><i style="color: yellow;" class="fa fa-pencil" aria-hidden="true"></i></a></li>
                                                        <li><a href="?mod=users&controller=team&action=delete&user_id=<?php echo $user['user_id'] ?>" title="Xóa" class="delete"><i style="color: red;" class="fa fa-trash" aria-hidden="true"></i></a></li>
                                                    </ul>
                                                </td>
                                            </tr>

                                        <?php
                                        } ?>

                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td><input type="checkbox" name="checkAll" id="checkAll"></td>
                                            <td><span class="thead-text">STT</span></td>
                                            <td><span class="thead-text">Ảnh đại diện</span></td>
                                            <td><span class="thead-text">Họ và tên</span></td>
                                            <td><span class="thead-text">Số điện thoại</span></td>
                                            <td><span class="thead-text">Email</span></td>
                                            <td><span class="thead-text">Địa chỉ</span></td>
                                            <td><span class="thead-text">Trạng thái</span></td>
                                            <td><span class="thead-text">Thời gian</span></td>
                                            <td><span class="thead-text">Phân quyền</span></td>
                                            <td><span class="thead-text">Sửa|Xóa</span></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </form>

                    </div>
                </div>
                <div class="section" id="paging-wp">
                    
                        <div class="section-detail clearfix">
                            <ul id="list-paging" class="fl-right">
                                <?php echo pagging_user() ?>
                            </ul>
                            
                        </div>
                    
                </div>
                <style>
                    .section-detail {
                        margin-top: 30px;
                    }

                    ul#list-paging li {
                        padding: 0pc 2px;
                    }

                    ul#list-paging li a {
                        border-radius: 1px solid #333;
                        padding: 6px 14px;
                        background: #d3cccc;
                        border-radius: 50%;
                        display: block;
                    }

                    ul#list-paging li.active a {
                        border: 1px solid #d63031;
                        background: #55efc4;
                    }
                </style>
            <?php
            } ?>
        </div>

    </div>
</div>
<?php get_footer()



?>