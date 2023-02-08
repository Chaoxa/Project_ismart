<?php get_header() ?>
<div id="main-content-wp" class="info-account-page">
    <div class="wrap clearfix">
        <?php get_sidebar('users') ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Cập nhật tài khoản</h3>
                    <a href="?mod=users&controller=team&action=add_account" title="" id="add-new" class="fl-left img-rounded">Thêm mới</a>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <form method="POST">
                        <label for="display-name">Tên hiển thị</label>
                        <input type="text" name="fullname" id="display-name" value="<?php echo $item['fullname'] ?>">
                        <?php echo form_error('fullname') ?>
                        <label for="username">Tên đăng nhập</label>
                        <input type="text" name="username" id="username" placeholder="<?php echo $item['username'] ?>" readonly="readonly">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" value="<?php echo $item['email'] ?>">
                        <?php echo form_error('email') ?>
                        <label for="tel">Số điện thoại</label>
                        <input type="tel" name="tel" id="tel" value="<?php echo $item['tel'] ?>">
                        <?php echo form_error('tel') ?>
                        <label for="address">Địa chỉ</label>
                        <textarea name="address" id="address" placeholder="Số nhà,Thôn,Phường,Quận,Thành Phố"><?php echo $item['address'] ?></textarea>
                        <?php echo form_error('address') ?>
                        <?php if (empty(notify('update_success'))) { ?>
                            <button type="submit" name="btn-submit" id="btn-submit" class="img-rounded">Cập nhật</button>
                        <?php } else {
                            echo notify('update_success');
                        }?>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer() ?>