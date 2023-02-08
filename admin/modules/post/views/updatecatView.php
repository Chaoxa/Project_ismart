<?php
get_header() ?>
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
                    <h3 id="index" class="fl-left">Thêm mới danh mục</h3>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <form method="POST" action="">
                        <label for="title">Tên danh mục</label>
                        <input type="text" name="post_cat" id="title">
                        <?php echo form_error('post_cat')?>
                        <label for="title">Slug ( Friendly_url )</label>
                        <input type="text" name="post_slug" id="slug">
                        <?php echo form_error('post_slug')?>
                        
                        
                        <label>Danh mục cha</label>
                        <select name="parent_cat">
                            <option value="">-- Chọn danh mục --</option> 
                            <option value="1">Danh mục cha</option>
                            <option value="2">Tư vấn</option>
                            <option value="3">--Laptop-Điện thoại</option>
                            <option value="4">--Phụ kiện</option>
                            <option value="5">Thủ thuật</option>
                            <option value="6">--Mẹo hay</option>
                        </select>
                        <?php echo form_error('parent_cat')?>

                        <button type="submit" name="btn-submit" id="btn-submit">Cập nhật</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
get_header() ?>
