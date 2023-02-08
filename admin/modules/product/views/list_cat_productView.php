<?php
get_header()
?>
<div id="main-content-wp" class="list-cat-page">
    <div class="wrap clearfix">
        <?php get_sidebar() ?>
        <div id="content" class="fl-right">

            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Danh sách danh mục</h3>
                    <a href="?mod=product&controller=cat&action=add_cat" title="" id="add-new" class="fl-left">Thêm mới</a>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <div class="filter-wp clearfix">
                        <ul class="post-status fl-left">
                            <li class="all"><a href="">Tất cả <span class="count">(10)</span></a> |</li>

                        </ul>
                        <form method="POST" class="form-s fl-right">
                            <input type="text" name="search" id="s">
                            <input type="submit" name="sm_s" value="Tìm kiếm">
                        </form>
                    </div>
                    <form method="POST" action="" class="form-actions">
                        <div class="actions">
                            <select name="actions">
                                <option value="0">Tác vụ</option>
                                <option value="1">Xóa</option>

                            </select>
                            <input type="submit" name="sm_action" value="Áp dụng">

                        </div>
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
                                        <td><span class="thead-text">Sửa|xóa</span></td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($list_product_cats)) {
                                        
                                    ?>
                                        <?php
                                        $temp = 0;
                                        foreach ($list_product_cats as $product) {
                                            $temp++;
                                            
                                        ?>
                                            <tr>
                                                <td><input type="checkbox" name="checkItem[<?php echo $product['cat_id'] ?>]" class="checkItem" value="<?php echo $product['cat_id'] ?>"></td>
                                                <td><span class="tbody-text"><?php echo $temp; ?></h3></span>
                                                <td class="clearfix">
                                                    <div class="tb-title fl-left">
                                                        <a href="" title=""><?php echo str_repeat('---', $product['level']) . $product['product_cat'] ?></a>
                                                    </div>
                                                </td>
                                                <td><span class="tbody-text"><?php echo $product['parent_id'] ?></span></td>
                                                <td><span class="tbody-text">Đã duyệt</span></td>
                                                <td><span class="tbody-text"><?php if (!empty(user_login())) echo user_login(); ?></span></td>
                                                <td><span class="tbody-text"><?php echo  date("d/m/Y-h:m:s", $product['created_date']) ?></span></td>
                                                <td class="clearfix">
                                                    <ul class="list-operation fl-right">
                                                        <li><a href="" title="Sửa" class="edit"><i class="fa fa-pencil" aria-hidden="true"></i></a></li>
                                                        <li><a href="" title="Xóa" class="delete"><i class="fa fa-trash" aria-hidden="true"></i></a></li>
                                                    </ul>
                                                </td>
                                            </tr>
                                            
                                        <?php
                                        
                                        } 
                                        ?>
                                       
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
                    </form>
                </div>
            </div>
            <div class="section" id="paging-wp">
                <div class="section-detail clearfix">
                    <p id="desc" class="fl-left">Chọn vào checkbox để lựa chọn tất cả</p>
                    <ul id="list-paging" class="fl-right">
                        <?php if(!empty($list_cats)) echo pagging_user() ?>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</div>
<?php
get_footer()
?>