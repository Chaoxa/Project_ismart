<?php get_header() ?>
<div id="main-content-wp" class="info-account-page">
    <div class="wrap clearfix">
        <?php get_sidebar('users') ?>
        <div id="content" class="fl-right">
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <div class="section" id="title-page">
                        <div class="clearfix">
                            <h3 id="index" class="fl-left">Thêm admin</h3>
                        </div>
                    </div>
                    <form method="POST">
                        <label for="display-name">Tên hiển thị</label>
                        <input type="text" name="fullname" id="display-name" value="<?php echo set_value('fullname') ?>">
                        <label for="control">Chức vụ</label>
                        <select name="control" id="control">
                            <?php global $control; ?>
                            <option value="">--Quyền kiểm soát--</option>
                            <option value="governor" <?php if ($control == 'governor') {
                                                            echo "selected";
                                                        } ?>>Toàn quyền</option>
                            <option value="sale-manager" <?php if ($control == 'sale-manager') {
                                                                echo "selected";
                                                            } ?>>Quản lý sale</option>
                            <option value="page-manager" <?php if ($control == 'page-manager') {
                                                                echo "selected";
                                                            } ?>>Quản lý pages</option>
                            <option value="display-manager" <?php if ($control == 'display-manager') {
                                                                echo "selected";
                                                            } ?>>Quản lý giao diện</option>
                        </select>
                        <?php echo form_error('control') ?>
                        <label for="usernamee">Tên đăng nhập</label>
                        <input type="text" name="username" id="usernamee" placeholder="admin" value="<?php echo set_value('usernamee') ?>">
                        <?php echo form_error('username') ?>
                        <label for="password">Mật khẩu</label>
                        <input type="password" name="password" id="password" value="<?php echo set_value('password') ?>">
                        <?php echo form_error('password') ?>
                        <label for="confirm-password">Xác nhận mật khẩu</label>
                        <input type="password" name="confirm-password" id="confirm-password" value="<?php echo set_value('confirm_password') ?>">
                        <?php echo form_error('confirm-password') ?>
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" value="<?php echo set_value('email') ?>">
                        <?php echo form_error('email') ?>
                        <label for="tel">Số điện thoại</label>
                        <input type="tel" name="tel" id="tel" value="<?php echo set_value('tel') ?>">
                        <?php echo form_error('tel') ?>
                        <label for="address">Địa chỉ</label>
                        <textarea name="address" id="address"><?php echo set_value('address') ?></textarea>
                        <?php echo form_error('address') ?>
                        <?php echo form_error('login') ?>
                        <?php echo form_error('confirm') ?>

                        <?php if (empty(notify('add_success'))) { ?>
                            <button type="submit" name="btn-submit" id="btn-submit" class="img-rounded">Thêm</button>
                        <?php } else {
                            echo notify('add_success');
                        } ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer() ?>