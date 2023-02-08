<?php get_header() ?>
<?php global $list_blog;
$list_blog = get_pagging1('blog');
foreach ($list_blog as &$value) {
    $value['url_delete'] = "?mod=post&action=delete_blog&id={$value['id']}";
    $value['url_update'] = "?mod=post&action=update_blog&id={$value['id']}";
}
// show_array($list_blog)
?>
<div id="main-content-wp" class="list-post-page">
    <div class="wrap clearfix">
        <?php get_sidebar() ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Danh sách bài viết</h3>
                    <a href="?mod=post&action=add_post" title="" id="add-new" class="fl-left img-rounded">Thêm mới</a>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <div class="filter-wp clearfix">
                        <ul class="post-status fl-left">
                            <li class="all"><a href="">Tất cả <span class="count"><?php echo '(' . count_amount('blog') . ')'; ?></span></a> |</li>
                            <li class="publish"><a href="">Đăng công khai <span class="count"><?php echo '(' . count_amount('blog', "`status` = '1'") . ')'; ?></span></a> |</li>
                            <li class="pending"><a href="">Chờ xét duyệt <span class="count"><?php echo '(' . count_amount('blog', "`status` = '0'") . ')'; ?></span></a></li>
                        </ul>
                        <form method="GET" class="form-s fl-right">
                            <input type="text" name="s" id="s">
                            <input type="submit" name="sm_s" value="Tìm kiếm">
                        </form>
                    </div>
                    <div class="actions">
                        <form method="GET" action="" class="form-actions">
                            <select name="actions">
                                <option value="0">Tác vụ</option>
                                <option value="1">Chỉnh sửa</option>
                                <option value="2">Bỏ vào thủng rác</option>
                            </select>
                            <input type="submit" name="sm_action" value="Áp dụng">
                        </form>
                    </div>
                    <div class="table-responsive">
                        <table class="table list-table-wp">
                            <thead>
                                <tr>
                                    <td><input type="checkbox" name="checkAll" id="checkAll"></td>
                                    <td><span class="thead-text">STT</span></td>
                                    <td><span class="thead-text">Tiêu đề</span></td>
                                    <td><span class="thead-text">Trạng thái</span></td>
                                    <td><span class="thead-text">Người tạo</span></td>
                                    <td><span class="thead-text">Thời gian</span></td>
                                    <td><span class="thead-text">Tác vụ</span></td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php global $start;
                                global $list_blog;
                                foreach ($list_blog as &$value) {
                                    $start++;
                                ?>
                                    <tr>
                                        <td><input type="checkbox" name="checkItem" class="checkItem"></td>
                                        <td><span class="tbody-text"><?php echo $start ?></h3></span>
                                        <td class="clearfix">
                                            <div class="tb-title fl-left">
                                                <a href="" title=""><b><?php echo $value['blog_title'] ?></b></a>
                                            </div>
                                        </td>
                                        <td><span class="tbody-text"><b><?php if ($value['status'] == 0) { ?><span class="bg-secondary p-1 img-rounded text-white small">Đang chờ duyệt</span><?php } else { ?><span class="bg-success p-1 img-rounded text-white small">Đang hoạt động</span><?php } ?></b></span></td>
                                        <td><span class="tbody-text"><?php echo $value['creator'] ?></span></td>
                                        <td><span class="tbody-text"><?php echo $value['time'] ?></span></td>
                                        <td><span class="tbody-text">
                                                <ul class="list-operation fl-right d-flex">
                                                    <li><a href="<?php echo $value['url_update'] ?>" title="Sửa" class="edit text-success"><i class="fa fa-pencil" aria-hidden="true"></i></a></li>
                                                    <li><a href="<?php echo $value['url_delete'] ?>" title="Xóa" class="delete text-danger"><i class="fa fa-trash" aria-hidden="true"></i></a></li>
                                                </ul>
                                            </span></td>
                                    </tr>
                                <?php } ?>
                        </table>
                    </div>

                </div>
            </div>
            <div class="section" id="paging-wp">
                <div class="section-detail clearfix">
                    <?php global $num_pages, $page;
                    echo get_pagging2($num_pages, $page, "?mod=post&action=list_post") ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer() ?>