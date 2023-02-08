<?php get_header() ?>
<div id="main-content-wp" class="add-cat-page">
    <div class="wrap clearfix">
        <?php get_sidebar() ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Thêm trang</h3>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <form method="POST">
                        <label for="title">Tên trang</label>
                        <input type="text" name="title" id="title" value="">

                        <?php echo form_error('title') ?>

                        <?php global $notify;
                        if (!empty($notify['success'])) {
                            echo notify('success'); ?>
                            <a href="?mod=page&action=add_page" id="btn-submit">Tiếp tục</a>
                        <?php
                        } else { ?>
                            <button type="submit" class="img-rounded mb-2" name="btn-submit" id="btn-submit">Thêm</button>
                        <?php } ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer() ?>