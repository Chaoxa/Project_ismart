<?php get_header(); ?>
<div id="main-content-wp" class="add-cat-page">
    <div class="wrap clearfix">
        <?php get_sidebar() ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Thêm mới bài viết</h3>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <label for="title">Tiêu đề</label>
                        <input type="text" name="title" id="title" class="m-0" value="<?php echo set_value('blog_title') ?>">
                        <?php echo form_error('title') ?>
                        <label for="content_demo">Demo tiêu đề</label>
                        <input type="text" name="content_demo" id="content_demo" class="m-0" value="<?php echo set_value('content_demo') ?>">
                        <?php echo form_error('content_demo') ?>
                        <label for="title">Slug ( Friendly_url )</label>
                        <input type="text" name="slug" id="slug">
                        <label for="content">Nội dung bài viết</label>
                        <textarea name="content" id="content" class="ckeditor"><?php echo set_value('content') ?></textarea>
                        <?php echo form_error('content') ?>
                        <label>Hình ảnh</label>
                        <div id="uploadFile">
                            <input type="file" name="file_upload" id="file_upload" onchange="chooseFile(this)">
                            <img src="public/images/img-thumb.png" alt="" id="image" class="img-rounded my-2" width="150">
                            <script>
                                var inputFile = document.querySelector("#file_upload")

                                function chooseFile(fileInput) {
                                    if (fileInput.files && fileInput.files[0]) {
                                        var reader = new FileReader();

                                        reader.onload = function(e) {
                                            $('#image').attr('src', e.target.result)
                                        }
                                        reader.readAsDataURL(fileInput.files[0]);
                                    }
                                }
                            </script>
                            <?php echo form_error('file_upload') ?>
                            <label class="mt-2">Danh mục cha</label>
                            <select name="parent_Cat" class="mb-0">
                                <option value="">-- Chọn danh mục --</option>
                                <?php foreach ($list_cat as $value) { ?>
                                    <option value="<?php echo $value['cat_id'] ?>"><?php echo $value['name_cat_blog'] ?></option>
                                <?php } ?>
                            </select>
                            <?php echo form_error('parent_Cat') ?>
                            <label class="mt-2">Trạng thái</label>
                            <select name="status" class="mb-0">
                                <option value="">-- Chọn trạng thái--</option>
                                <option value="0">Chờ phê duyệt</option>
                                <option value="1">Đăng công khai</option>
                            </select>
                            <?php echo form_error('status') ?>
                        </div>
                        <?php global $notify;
                        if (empty($notify['success'])) { ?>
                            <button type="submit" name="btn-submit" id="btn-submit" class="btn-style img-rounded"><span>Thêm mới</span></button>
                        <?php } else {
                        ?>
                            <a href="?mod=post&action=add_post" class="btn-sm btn-success"><b>Tiếp tục thêm</b></a>
                        <?php
                            echo notify('success');
                        } ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer() ?>