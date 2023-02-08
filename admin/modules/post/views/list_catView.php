<?php
get_header()
?>

<div id="main-content-wp" class="list-cat-page">
    <div class="wrap clearfix">
        <?php get_sidebar(); ?>
        <div id="content" class="fl-right">
            <?php if (!empty($list_cats)) {
            ?>
                <div class="section" id="title-page">
                    <div class="clearfix">
                        <h3 id="index" class="fl-left">Danh sách danh mục</h3>
                        <a href="?mod=post&controller=cat&action=add_cat" title="" id="add-new" class="fl-left">Thêm mới</a>
                    </div>
                </div>
                <div class="section" id="detail-page">
                    <div class="section-detail">
                        <div class="table-responsive">
                            <table class="table list-table-wp">
                                <thead>
                                    <tr>
                                        <td><input type="checkbox" name="checkAll" id="checkAll"></td>
                                        <td><span class="thead-text">STT</span></td>
                                        <td><span class="thead-text">Danh mục</span></td>
                                        <td><span class="thead-text">Thứ tự</span></td>
                                        <td><span class="thead-text">Trạng thái</span></td>
                                        <td><span class="thead-text">Người tạo</span></td>
                                        <td><span class="thead-text">Thời gian</span></td>
                                        <td style="width:70px;"><span class="thead-text">Sửa|xóa</span></td>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $temp = 0;
                                    foreach ($list_cats as $value) {
                                        $temp++;
                                    ?>
                                        <tr>
                                            <td><input type="checkbox" name="checkItem[<?php echo $value['cat_id'] ?>]" class="checkItem" value="<?php echo $value['cat_id'] ?>"></td>
                                            <td><span class="tbody-text"><?php echo $temp; ?></h3></span>
                                            <td class="clearfix">
                                                <div class="tb-title fl-left">
                                                    <a href="" title=""><?php echo str_repeat('---', $value['level']).$value['post_cat'] ?></a>
                                                </div>

                                            </td>
                                            <td><span class="tbody-text"><?php echo $value['parent_cat'] ?></span></td>
                                            <td><span style="color: green" class="tbody-text">Đã đăng</span></td>
                                            <td><span class="tbody-text"><?php if (!empty(user_login())) echo user_login(); ?></span></td>
                                            <td><span class="tbody-text">12-07-2016</span></td>
                                            <td class="clearfix">

                                                <ul class="list-operation fl-right">
                                                    <li><a href="?mod=post&controller=cat&action=updatecat&cat_id=<?php echo $value['cat_id'] ?>" title="Sửa" class="edit"><i class="fa fa-pencil" aria-hidden="true"></i></a></li>
                                                    <li><a href="?mod=post&controller=cat&action=delete&cat_id=<?php echo $value['cat_id'] ?>" title="Xóa" class="delete"><i class="fa fa-trash" aria-hidden="true"></i></a></li>
                                                </ul>
                                            </td>
                                        </tr>
                                    <?php
                                    } ?>

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td><input type="checkbox" name="checkAll" id="checkAll"></td>
                                        <td><span class="tfoot-text">STT</span></td>
                                        <td><span class="tfoot-text-text">Danh mục</span></td>
                                        <td><span class="tfoot-text">Thứ tự</span></td>
                                        <td><span class="tfoot-text">Trạng thái</span></td>
                                        <td><span class="tfoot-text">Người tạo</span></td>
                                        <td><span class="tfoot-text">Thời gian</span></td>
                                        <td><span class="thead-text">Sửa|xóa</span></td>


                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="section" id="paging-wp">
                    <div class="section-detail clearfix">
                        <p id="desc" class="fl-left">Chọn vào checkbox để lựa chọn tất cả</p>
                        <ul id="list-paging" class="fl-right">
                            <li>
                                <a href="" title="">
                                    << /a>
                            </li>
                            <li>
                                <a href="" title="">1</a>
                            </li>
                            <li>
                                <a href="" title="">2</a>
                            </li>
                            <li>
                                <a href="" title="">3</a>
                            </li>
                            <li>
                                <a href="" title="">></a>
                            </li>
                        </ul>
                    </div>
                </div>
            <?php
            } ?>
        </div>
    </div>
</div>
<?php
get_footer()
?>