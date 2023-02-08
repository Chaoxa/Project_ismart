<?php get_header() ?>
<div id="main-content-wp" class="add-cat-page">
    <div class="wrap clearfix">
        <?php get_sidebar() ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Thêm nội dung trang</h3>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <form method="POST">
                        <label for="title">Tiêu đề</label>
                        <input type="text" name="title" id="title">
                        <?php echo form_error('title') ?>
                        <label for="slug">Slug ( Friendly_url )</label>
                        <input type="text" name="slug" id="slug">
                        <label for="content">Nội dung</label>
                        <textarea name="content" id="content" class="ckeditor"></textarea>
                        <?php echo form_error('content') ?>

                        <label class="mt-3" for="cat_id">Danh mục sản phẩm <span class="text-danger">(*)</span></label>
                        <select name="cat_id">
                            <option value="">-- Chọn danh mục --</option>
                            <?php foreach ($list_cat_page as $value) { ?>
                                <option value="<?php echo $value['cat_id'] ?>"><?php echo $value['name_cat_page'] ?></option>
                            <?php } ?>
                            <?php echo form_error('cat_id') ?>

                        </select>
                        <button type="submit" name="btn-submit" id="btn-submit img-rounded">Thêm</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer() ?>