<?php
get_header();
?>
<style>
    p.error {
        color: red;
    }
</style>
<div id="main-content-wp" class="add-cat-page">
    <div class="wrap clearfix">
        <?php get_sidebar(); ?>
        <div id="content" class="fl-right">      
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Thêm trang</h3>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <form method="POST" action="">
                        <label for="title">Tiêu đề</label>                  
                        <input type="text" name="title" id="title" value="<?php echo set_value('title'); ?>">
                        <?php echo form_error('title') ?>  
                        <label for="title">Slug ( Friendly_url )</label>
                        <input type="text" name="page_slug" id="slug" value="<?php echo set_value('page_slug'); ?>">
                        <?php echo form_error('page_slug') ?>
                        <label for="desc">Mô tả</label>
                        <textarea name="page_content" id="desc" class="ckeditor" value="<?php echo set_value('page_content'); ?>"></textarea>

                        <?php echo form_error('page_content') ?>

                        <button type="submit" name="btn-submit" id="btn-submit">Cập nhật</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
get_footer();
?>