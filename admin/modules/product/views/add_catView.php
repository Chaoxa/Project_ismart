<?php get_header() ?>
<div id="main-content-wp" class="add-cat-page">
    <div class="wrap clearfix">
        <?php get_sidebar() ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Thêm danh mục sản phẩm</h3>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <form method="POST">
                        <label for="title">Tên danh mục</label>
                        <input type="text" name="title" id="title" value="<?php echo set_value('title') ?>">
                        <?php echo form_error('title') ?>
                        <label>Danh mục cha</label>
                        <select name="parent-Cat">
                            <option value="">-- Chọn danh mục --</option>
                            <?php foreach ($list_parent_cat as $value) { ?>
                                <option value="<?php echo $value['id'] ?>"><?php echo $value['tbl_cat_parent_name'] ?></option>
                            <?php } ?>
                        </select>
                        <?php echo form_error('parent-Cat') ?>
                        <?php global $notify;
                        if (!empty($notify['success'])) {
                            echo notify('success'); ?>
                            <a href="?mod=product&action=add_cat_product" id="btn-submit">Tiếp tục</a>
                        <?php
                        } else { ?>
                            <button type="submit" class="img-rounded" name="btn-submit" id="btn-submit">Cập nhật</button>
                        <?php } ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer() ?>