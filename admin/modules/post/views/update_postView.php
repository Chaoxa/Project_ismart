<?php get_header(); ?>
<div id="main-content-wp" class="add-cat-page">
    <div class="wrap clearfix">
        <?php get_sidebar() ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Cập nhật bài viết</h3>
                </div>
            </div>
            <?php if ($blog['status'] == 0) { ?>
                <form action="" method="POST" class="float-right mt-4 mr-5">
                    <input type="submit" name="btn_approve" class="btn btn-success" value="Phê duyệt">
                </form>
            <?php } ?>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <label for="title">Tiêu đề</label>
                        <input type="text" name="title" id="title" class="m-0" value="<?php echo $blog['blog_title']; ?>">
                        <?php echo form_error('title') ?>
                        <label for="content_demo">Demo tiêu đề</label>
                        <input type="text" name="content_demo" id="content_demo" class="m-0" value="<?php echo $blog['content_demo']; ?>">
                        <?php echo form_error('content_demo') ?>
                        <label for="title">Slug ( Friendly_url )</label>
                        <input type="text" name="slug" id="slug">
                        <label for="content">Nội dung bài viết</label>
                        <textarea name="content" id="content" class="ckeditor"><?php echo $blog['content']; ?></textarea>
                        <?php echo form_error('content') ?>
                        <label>Hình ảnh</label>
                        <?php global $notify;
                        if (empty($notify['success'])) { ?>
                            <button type="submit" name="btn-submit" id="btn-submit" class="btn-style img-rounded"><span>Cập nhật</span></button>
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