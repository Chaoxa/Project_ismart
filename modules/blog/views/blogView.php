<?php get_header() ?>
<style>
    .thumb-main img {
        width: 263px;
        height: 176px;
    }
</style>
<div id="main-content-wp" class="clearfix blog-page">
    <div class="wp-inner">
        <div class="secion" id="breadcrumb-wp">
            <div class="secion-detail">
                <ul class="list-item clearfix">
                    <li>
                        <a href="" title="">Trang chủ</a>
                    </li>
                    <li>
                        <a href="" title="">Blog</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-content fl-right">
            <?php if (count($list_blog) != 0) { ?>
                <div class="section" id="list-blog-wp">
                    <div class="section-head clearfix">
                        <h3 class="section-title btn-success d-inline-block p-2 img-rounded">Blog</h3>
                    </div>
                    <div class="section-detail">
                        <ul class="list-item">
                            <?php foreach ($list_blog as $value) { ?>
                                <li class="clearfix">
                                    <a href="<?php echo $value['url'] ?>" title="" class="thumb-main fl-left">
                                        <img src="<?php echo $value['thumb_main_blog'] ?>" alt="">
                                    </a>
                                    <div class="info fl-right">
                                        <a href="<?php echo $value['url'] ?>" title="" class="title"><?php echo $value['blog_title'] ?></a>
                                        <div class="d-flex">
                                            <span class="create-date"><?php echo $value['time'] ?></span>
                                        </div>
                                        <p class="desc"><?php echo $value['content_demo'] ?></p>
                                    </div>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
                <div class="section" id="paging-wp">
                    <div class="section-detail">
                        <ul class="list-item clearfix">
                            <li>
                                <a href="" title="">1</a>
                            </li>
                            <li>
                                <a href="" title="">2</a>
                            </li>
                            <li>
                                <a href="" title="">3</a>
                            </li>
                        </ul>
                    </div>
                </div>
            <?php } else { ?>
                <h1 class="text-danger"><b>Hiện chưa có bài viết nào!</b></h1>
            <?php
            } ?>
        </div>
        <?php get_sidebar('page') ?>
    </div>
</div>
<?php get_footer() ?>