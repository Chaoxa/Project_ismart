<?php get_header(); ?>
<?php global $list_product;
$list_product = get_pagging1('tbl_product');

foreach ($list_product as &$value) {
    $value['url_update'] = "?mod=product&action=update_product&id={$value['id']}";
    $value['url_delete'] = "?mod=product&action=temporary_delete&id={$value['id']}";
    $value['url_retore'] = "?mod=product&action=restore&id={$value['id']}";
    $value['url_deleted'] = "?mod=product&action=delete_product&id={$value['id']}";
    $value['url'] = "?mod=product&action=detail_product&id={$value['id']}";
}
?>
<div id="main-content-wp" class="list-product-page">
    <div class="wrap clearfix">
        <?php get_sidebar() ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Danh sách sản phẩm</h3>
                    <a href="?mod=product&action=add_product" title="" id="add-new" class="fl-left img-rounded">Thêm mới</a>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <?php get_action_manager() ?>
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
                                    <td><span class="thead-text">Mã sản phẩm</span></td>
                                    <td><span class="thead-text">Hình ảnh</span></td>
                                    <td><span class="thead-text">Tên sản phẩm</span></td>
                                    <td><span class="thead-text">Giá</span></td>
                                    <td><span class="thead-text">Danh mục</span></td>
                                    <td><span class="thead-text">Trạng thái</span></td>
                                    <td><span class="thead-text">Người tạo</span></td>
                                    <td><span class="thead-text">Thời gian</span></td>
                                    <td><span class="thead-text">Tác vụ</span></td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php global $start;
                                global $list_product;
                                foreach ($list_product as &$value) {
                                    $start++ ?>
                                    <tr>
                                        <td><input type="checkbox" name="checkItem" class="checkItem"></td>
                                        <td><span class="tbody-text"><?php echo $start ?></h3></span>
                                        <td><span class="tbody-text"><a href="<?php echo $value['url_update'] ?>" class="text-dark"><?php echo $value['product_code'] ?></a></span>
                                        <td>
                                            <div class="tbody-thumb">
                                                <a href="<?php echo $value['url_update'] ?>"><img src="<?php echo format_link_image($value['thumb_main'], 'admin/') ?>" alt=""></a>
                                            </div>
                                        </td>
                                        <td class="clearfix">
                                            <div class="tb-title fl-left">
                                                <a href="<?php echo source_url($value['url']) ?>" title="" class="text-primary"><?php echo $value['product_name'] ?></a>
                                            </div>
                                        </td>
                                        <td><span class="tbody-text text-danger"><b><?php echo price($value['new_price'], 'đ') ?></b></span></td>
                                        <td><span class="tbody-text"><?php echo format_name_cat_by_number($value['cat_id']) ?></span></td>
                                        <td><span class="tbody-text"><?php if ($value['temporary_delete'] == 0) { ?> <b class="text-success">Hoạt động</b> <?php } else { ?> <b class="text-danger">Đã xóa</b> <?php } ?></span></td>
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
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="section" id="paging-wp">
                <div class="section-detail clearfix">
                    <p id="desc" class="fl-left">Chọn vào checkbox để lựa chọn tất cả</p>
                    <?php global $num_pages, $page;
                    echo get_pagging2($num_pages, $page, "?mod=product&action=list_product") ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer() ?>