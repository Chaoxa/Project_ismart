<?php get_header() ?>
<div id="main-content-wp" class="change-pass-page">
    <div class="wrap clearfix">
        <?php get_sidebar('users') ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Cập nhật tài khoản</h3>
                    <a href="?mod=users&action=add_account" title="" id="add-new" class="fl-left img-rounded">Thêm mới</a>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <form method="POST">
                        <label for="old-pass">Mật khẩu cũ</label>
                        <input type="password" name="old-pass" id="pass-old" value="<?php echo set_value('old_pass') ?>">
                        <?php echo form_error('old-pass') ?>
                        <label for="new-pass">Mật khẩu mới</label>
                        <input type="password" name="password" id="pass-new" value="<?php echo set_value('password') ?>">
                        <?php echo form_error('password') ?>
                        <label for="confirm-pass">Xác nhận mật khẩu</label>
                        <input type="password" name="confirm-password" id="confirm-pass" value="<?php echo set_value('confirm_password') ?>">
                        <?php echo form_error('confirm-password') ?>
                        <?php echo form_error('confirm') ?>
                        <button type="submit" name="btn-submit" id="btn-submit" class="btn-style img-rounded"><span>Cập nhật</span></button>
                        <?php echo notify('success') ?>
                        <?php echo notify('false') ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer() ?>