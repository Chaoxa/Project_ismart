<?php get_header() ?>

<div id="main-content-wp" class="list-post-page">
    <div class="wrap clearfix">
        <?php get_sidebar('users') ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Danh sách người quản lý</h3>
                    <a href="?mod=users&controller=team&action=add_account" title="" id="add-new" class="fl-left img-rounded">Thêm mới</a>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <div class="actions">
                        <form method="GET" action="" class="form-actions">
                            <select name="actions">
                                <option value="0">Tác vụ</option>
                                <option value="1">Chỉnh sửa</option>
                                <option value="2">Bỏ vào thủng rác</option>
                            </select>
                            <input type="submit" name="sm_action" value="Áp dụng">
                        </form>
                    </div>
                    <div class="table-responsive">
                        <table class="table list-table-wp">
                            <thead>
                                <tr>
                                    <td><input type="checkbox" name="checkAll" id="checkAll"></td>
                                    <td><span class="thead-text">STT</span></td>
                                    <td><span class="thead-text">Ảnh</span></td>
                                    <td><span class="thead-text">Họ và tên</span></td>
                                    <td><span class="thead-text">Tên tài khoản</span></td>
                                    <td><span class="thead-text">Trạng thái</span></td>
                                    <td><span class="thead-text">Người tạo</span></td>
                                    <td><span class="thead-text">Thời gian</span></td>
                                    <td><span class="thead-text">Chức vụ</span></td>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                $temp = 0;
                                foreach ($list_admin as $admin) {
                                    $temp++;
                                ?>
                                    <tr>
                                        <td><input type="checkbox" name="checkItem" class="checkItem"></td>
                                        <td><span class="tbody-text"><?php echo $temp ?></h3></span>
                                        <td><span class="tbody-text">
                                                <div id="thumb-logo-user">
                                                    <img src="<?php echo $admin['avt'] ?>" alt="">
                                                </div>
                                            </span></td>
                                        <td class="clearfix">
                                            <div class="tb-title fl-left">
                                                <a href="" title=""><?php echo $admin['fullname'] ?></a>
                                            </div>
                                            <ul class="list-operation fl-right">
                                                <li><a href="?mod=users&controller=team&action=update_user_login&id=<?php echo $admin['users_id'] ?>" title="Sửa" class="edit"><i class="fa fa-pencil" aria-hidden="true"></i></a></li>
                                                <li><a href="?mod=users&controller=team&action=delete_user_login&id=<?php echo $admin['users_id'] ?>" title="Xóa" class="delete"><i class="fa fa-trash" aria-hidden="true"></i></a></li>
                                            </ul>
                                        </td>
                                        <td><span class="tbody-text"><?php echo $admin['username'] ?></span></td>
                                        <td><span class="tbody-text active">Hoạt động</span></td>
                                        <td><span class="tbody-text"><?php echo $admin['creator'] ?></span></td>
                                        <td><span class="tbody-text"><?php echo $admin['date_reg'] ?></span></td>
                                        <td><span class="tbody-text"><?php echo control($admin['control']) ?></span></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>
<?php get_footer() ?>