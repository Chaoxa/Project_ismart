<?php get_header() ?>
<div id="main-content-wp" class="list-cat-page">
    <div class="wrap clearfix">
        <?php get_sidebar() ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Danh mục bài viết</h3>
                    <a href="?mod=post&action=add_cat" title="" id="add-new" class="fl-left img-rounded">Thêm mới</a>
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
                                    <td><span class="thead-text">Tiêu đề</span></td>
                                    <td><span class="thead-text">Trạng thái</span></td>
                                    <td><span class="thead-text">Người tạo</span></td>
                                    <td><span class="thead-text">Thời gian</span></td>
                                    <td><span class="thead-text">Tác vụ</span></td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $temp = 0;
                                foreach ($list_cat_blog as $value) {
                                    $temp++ ?>
                                    <tr>
                                        <td><input type="checkbox" name="checkItem" class="checkItem"></td>
                                        <td><span class="tbody-text"><?php echo $temp ?></h3></span>
                                        <td class="clearfix">
                                            <div class="tb-title fl-left">
                                                <a href="" title=""><b><?php echo $value['name_cat_blog'] ?></b></a>
                                            </div>
                                        </td>
                                        <td><span class="tbody-text text-success"><b>Hoạt động</b></span></td>
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
                    <p id="desc" class="fl-left">Chọn vào checkbox để lựa chọn tất cả</p>
                    <ul id="list-paging" class="fl-right">
                        <li>
                            <a href="" title="">
                                < </a>
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
        </div>
    </div>
</div>
<?php get_footer() ?>