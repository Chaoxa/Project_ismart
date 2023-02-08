<?php get_header(); ?>
<div id="main-content-wp" class="add-cat-page">
    <div class="wrap clearfix">
        <?php get_sidebar() ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Sửa danh mục bài viết</h3>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <form method="POST">
                        <label for="name_cat_blog">Tên danh mục</label>
                        <input type="text" name="name_cat_blog" id="name_cat_blog" value="<?php echo $cat_blog['name_cat_blog'] ?>">
                        <?php echo form_error('name_cat_blog') ?>
                        <button type="submit" class="img-rounded" name="btn-submit" id="btn-submit btn-style" class="mt-2"><span>Cập nhật</span></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer() ?>