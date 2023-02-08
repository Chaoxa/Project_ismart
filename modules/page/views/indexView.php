<?php get_header() ?>
<div id="main-content-wp" class="clearfix detail-blog-page">
    <div class="wp-inner" style="position: relative;">
        <div class="secion" id="breadcrumb-wp">
            <div class="secion-detail">
                <ul class="list-item clearfix">
                    <li>
                        <a href="?" title="">Trang chủ</a>
                    </li>
                    <li>
                        <a href="" title="">Trang</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="con-md-6">
            <?php if ($num_row_page > 0) { ?>
                <div class="main-content fl-right">
                    <div class="section" id="detail-blog-wp">
                        <div class="section-head clearfix">
                            <h3 class="section-title"><?php echo $page['title'] ?></h3>
                        </div>
                        <div class="section-detail">
                            <div class="d-flex">
                                <span class="creator mr-2"><?php echo $page['creator'] ?></span>
                                <span class="create-date"> <?php echo $page['time'] ?></span>
                            </div>
                            <div class="detail">
                                <?php echo $page['content'] ?>
                            </div>
                        </div>
                    </div>
                    <div class="section" id="social-wp">
                        <div class="section-detail">
                            <div class="fb-like" data-href="" data-layout="button_count" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>
                            <div class="g-plusone-wp">
                                <div class="g-plusone" data-size="medium"></div>
                            </div>
                            <div class="fb-comments" id="fb-comment" data-href="" data-numposts="5"></div>
                        </div>
                    </div>
                </div>
            <?php } else { ?>
                <div class="">
                    <img src="https://cdn.divineshop.vn/static/4e0db8ffb1e9cac7c7bc91d497753a2c.svg" style="position: absolute; top: 200px; left:750px" alt="" class="float-right">
                </div>
            <?php } ?>
        </div>
        <?php get_sidebar('page') ?>
    </div>
</div>
<?php get_footer() ?>