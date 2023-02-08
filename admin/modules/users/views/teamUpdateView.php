<?php get_header()
?>


<style>
    p.error {
        color: red;
    }
</style>
<div id="main-content-wp" class="add-cat-page">
    <div class="wrap clearfix">
        <?php get_sidebar('users') ?>
        <div id="content" class="fl-right">

            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Thêm mới danh mục</h3>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <?php
                    // echo alert('success', "?mod=users&controller=team");
                    ?>
                    <form action="" method="POST" enctype="multipart/form-data">
                        <label for="display-name">Tên hiển thị</label>
                        <input type="text" name="fullname" id="display-name" value="<?php echo $info_user['fullname'] ?>">
                        <?php echo  form_error('fullname') ?>
                        <label for="username">Tên đăng nhập</label>
                        <input type="text" name="username" id="username" placeholder="admin" value="<?php echo $info_user['username'] ?>">
                        <?php echo  form_error('username') ?>

                        <label for="username">password</label>
                        <input type="password" name="password" id="password" placeholder="Password">
                        <?php echo form_error('password'); ?>


                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" value="<?php echo $info_user['email'] ?>">
                        <?php echo  form_error('email') ?>

                        <label for="tel">Số điện thoại</label>
                        <input type="tel" name="phone_number" id="tel" value="<?php echo $info_user['phone_number'] ?>">
                        <label for="address">Địa chỉ</label>
                        <textarea name="adress" id="address"><?php echo $info_user['adress'] ?></textarea>

                        <label>Hình ảnh</label>
                        <div id="uploadFile">
                            <input type="file" name="file" id="upload-thumb">
                            <?php echo  form_error('avatar') ?>
                            <!-- <input type="submit" name="btn-upload-thumb" value="Upload" id="btn-upload-thumb"> -->
                            <img src="<?php echo $info_user['avatar'] ?>">
                        </div>


                        <label>Danh mục cha</label>
                        <select name="actions">
                            <option value="">Phân quyền</option>
                            <option value="1">Toàn quyền</option>
                            <option value="2">Quản trị trang, bài viết, slider, menu</option>
                            <option value="3">Quản trị sản phẩm, đơn hàng, media, menu</option>
                        </select>
                        <button type="submit" name="btn-submit" id="btn-submit">Cập nhật</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer() ?>