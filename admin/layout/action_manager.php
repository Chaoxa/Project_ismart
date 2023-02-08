<?php $all = get_list_product() ?>
<?php $garbage = get_list_product("`temporary_delete` = '1'") ?>
<?php $posted = get_list_product("`status` = '1'") ?>
<div class="filter-wp clearfix">
    <ul class="post-status fl-left">
        <li class="all"><a href="?mod=product&action=list_product">Tất cả <span class="count"><?php echo "(" . count($all) . ")" ?></span></a> |</li>
        <li class="publish"><a href="">Đã đăng <span class="count"><?php echo "(" . count($posted) . ")" ?></span></a> |</li>
        <li class="pending"><a href="">Chờ xét duyệt<span class="count">(0)</span> |</a></li>
        <li class="pending"><a href="?mod=product&action=garbage_product">Thùng rác <span class="count"><?php echo "(" . count($garbage) . ")" ?></span></a></li>
    </ul>
    <form method="GET" class="form-s fl-right">
        <input type="text" name="s" id="s">
        <input type="submit" name="sm_s" value="Tìm kiếm" class="bg-success text-white">
    </form>
</div>