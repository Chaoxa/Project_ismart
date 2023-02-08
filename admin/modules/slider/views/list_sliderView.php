<?php get_header() ?>
<?php global $list_product;
$list_slider = get_pagging1('tbl_slide');
foreach ($list_slider as &$value) {
    $value['url_update'] = "?mod=slider&action=update_slider&id={$value['id']}";
    $value['url_delete'] = "?mod=slider&action=delete_temporary&id={$value['id']}";
}
?>

<div id="main-content-wp" class="list-product-page list-slider">
    <div class="wrap clearfix">
        <?php get_sidebar() ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Danh sách slider</h3>
                    <a href="?mod=slider&action=add_slider" title="" id="add-new" class="fl-left" class="btn img-rounded">Thêm mới</a>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <div class="filter-wp clearfix">
                        <ul class="post-status fl-left">
                            <li class="all"><a href="">Tất cả <span class="count"><?php echo '(' . count_amount('tbl_slide') . ')' ?></span></a> |</li>
                            <li class="pending"><a href="?mod=slider&action=garbage_slider">Thùng rác<span class="count"><?php echo '(' . count_amount('tbl_slide', " `status` = '1'") . ')' ?></span></a></li>
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
                                <option value="1">Công khai</option>
                                <option value="1">Chờ duyệt</option>
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
                                    <td><span class="thead-text">Hình ảnh</span></td>
                                    <td><span class="thead-text">Link</span></td>
                                    <td><span class="thead-text">Thứ tự</span></td>
                                    <td><span class="thead-text">Trạng thái</span></td>
                                    <td><span class="thead-text">Người tạo</span></td>
                                    <td><span class="thead-text">Thời gian</span></td>
                                    <td><span class="thead-text">Tác vụ</span></td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php global $start;
                                // show_array($list_slider);
                                foreach ($list_slider as &$value) {
                                    $start++; ?>
                                    <tr>
                                        <td><input type="checkbox" name="checkItem" class="checkItem"></td>
                                        <td><span class="tbody-text"><?php echo $start ?></span>
                                        <td>
                                            <div class="tbody-thumb">
                                                <img src="<?php echo format_link_image($value['thumb_main'], 'admin/') ?>" alt="">
                                            </div>
                                        </td>
                                        <td class="clearfix">
                                            <div class="tb-title fl-left">
                                                <a href="" title=""><?php echo $value['link'] ?></a>
                                            </div>
                                        </td>
                                        <td><span class="tbody-text"><?php echo $value['sort'] ?></span></td>
                                        <td><span class="tbody-text"><?php if ($value['status'] == 0) { ?> <b class="text-success">Hoạt động</b> <?php } else { ?> <b class="text-danger">Đã xóa</b> <?php } ?></span></span></td>
                                        <td><span class="tbody-text"><?php echo $value['creator'] ?></span></td>
                                        <td><span class="tbody-text"><?php echo $value['time'] ?></span></td>
                                        <td>
                                            <span>
                                                <a href="<?php echo $value['url_update'] ?>" title="Sửa" class="edit"><i class="fa fa-pencil text-primary px-1" aria-hidden="true"></i></a></li>
                                                <a href="<?php echo $value['url_delete'] ?>" title="Xóa" class="delete"><i class="fa fa-trash text-danger px-1" aria-hidden="true"></i></a></li>
                                            </span>
                                        </td>
                                    </tr>
                                <?php } ?>
                        </table>
                    </div>
                </div>
            </div>
            <div class="section" id="paging-wp">
                <div class="section-detail clearfix">
                    <p id="desc" class="fl-left">Chọn vào checkbox để lựa chọn tất cả</p>
                    <?php global $num_pages, $page;
                    echo get_pagging2($num_pages, $page, "?mod=slider&action=list_slider") ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer() ?>