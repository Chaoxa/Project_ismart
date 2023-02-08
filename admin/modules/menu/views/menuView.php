<?php get_header() ?>
<div id="main-content-wp" class="add-cat-page menu-page">

    <div class="wrap clearfix">
        <?php get_sidebar() ?>
        <div id="content" class="fl-right">
            <div class="section-detail clearfix">
                <div id="list-menu" class="fl-left">
                    <form method="POST" action="">
                        <div class="form-group">
                            <label for="title">Tên menu</label>
                            <input type="text" name="menu_name" id="title">
                            <?php form_error('menu_name') ?>
                        </div>

                        <p class='mess_error'></p>
                        <div class="form-group">
                            <label for="url-static">Đường dẫn tĩnh</label>
                            <input type="text" name="slug" id="url-static">
                            <?php form_error('slug') ?>
                            <p>Chuỗi đường dẫn tĩnh cho menu</p>
                        </div>

                        <div class="form-group">
                            <label for="menu-order">Thứ tự</label>
                            <input type="text" name="parent_id" id="menu-order">
                            <?php form_error('parent_id') ?>

                        </div>
                        <p class='mess_error'></p>
                        <div class="form-group">
                            <button type="submit" name="sm_add" id="btn-save-list">Lưu danh mục</button>
                        </div>
                    </form>
                </div>
                <div id="category-menu" class="fl-right">
                    <div class="actions">
                        <select name="post_status">
                            <option value="-1">Tác vụ</option>
                            <option value="delete">Xóa vĩnh viễn</option>
                        </select>
                        <button type="submit" name="sm_block_status" id="sm-block-status">Áp dụng</button>
                    </div>
                    <div class="table-responsive">
                        <table class="table list-table-wp">
                            <thead>
                                <tr>
                                    <td><input type="checkbox" name="checkAll" id="checkAll"></td>
                                    <td><span class="thead-text">STT</span></td>
                                    <td><span class="thead-text">Tên menu</span></td>
                                    <td style="text-align: center;"><span class="thead-text">Slug</span></td>
                                    <td style="text-align: center;"><span class="thead-text">Thứ tự</span></td>
                                    <td style="text-align: center;"><span class="thead-text">Người tạo</span></td>
                                    <td style="text-align: center;"><span class="thead-text">Thời gian</span></td>
                                    <td style="text-align: center;"><span class="thead-text">Sửa|xóa</span></td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($list_menu)) {
                                    $k = 0;
                                    foreach ($list_menu as $menu) {
                                        $k++;
                                ?>
                                        <tr>
                                            <td><input type="checkbox" name="checkItem[]" class="checkItem" value="1"></td>
                                            <td><span class="tbody-text"><?php echo $k; ?></span>
                                            <td>
                                                <div class="tb-title fl-left">
                                                    <a href="" title=""><?php echo $menu['menu_name'] ?></a>
                                                </div>

                                            </td>
                                            <td style="text-align: center;"><span class="tbody-text"><?php echo $menu['slug'] ?></span></td>
                                            <td style="text-align: center;"><span class="tbody-text"><?php echo $menu['parent_id'] ?></span></td>
                                            <td style="text-align: center;"><span class="tbody-text"><?php if (!empty(user_login())) echo user_login(); ?></span></td>
                                            <td style="text-align: center;"><span class="tbody-text"><?php echo  date("d/m/Y-h:m:s", $menu['created_date']) ?></span></td>
                                            <td>
                                                <ul class="list-operation fl-right">
                                                    <li><a href="?mod=menu&controller=index&action=edit&id=2" title="Sửa" class="edit"><i class="fa fa-pencil" aria-hidden="true"></i></a></li>
                                                    <li><a href="?mod=menu&controller=index&action=delete&id=2" title="Xóa" class="delete"><i class="fa fa-trash" aria-hidden="true"></i></a></li>
                                                </ul>
                                            </td>
                                        </tr>
                                <?php
                                    }
                                }
                                ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td><input type="checkbox" name="checkAll" id="checkAll"></td>
                                    <td><span class="thead-text">STT</span></td>
                                    <td><span class="thead-text">Tên menu</span></td>
                                    <td style="text-align: center;"><span class="thead-text">Slug</span></td>
                                    <td style="text-align: center;"><span class="thead-text">Thứ tự</span></td>
                                    <td style="text-align: center;"><span class="thead-text">Người tạo</span></td>
                                    <td style="text-align: center;"><span class="thead-text">Thời gian</span></td>
                                    <td style="text-align: center;"><span class="thead-text">Sửa|xóa</span></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer() ?>