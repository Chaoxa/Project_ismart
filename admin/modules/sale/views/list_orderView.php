<?php get_header() ?>
<?php $list_order = get_pagging1('tbl_order', ' 1 ORDER BY id DESC'); ?>
<?php
foreach ($list_order as &$value) {
    $value['product'] = json_decode($value['product'], true);
    $value['amount'] = count($value['product']);
    $main_total = 0;
    foreach ($value['product'] as $item) {
        $main_total += $item['sub_total'];
    }
    $value['url_detail'] = "?mod=sale&action=detail_order&id={$value['id']}";
    $value['url_delete'] = "?mod=sale&action=delete_order&id={$value['id']}";
    $value['main_total'] = $main_total;
}
// show_array($list_order);
$total_list_order = db_fetch_array('SELECT * FROM `tbl_order` WHERE `progress` = "2"');
?>
<?php
foreach ($total_list_order  as &$value) {
    $value['product'] = json_decode($value['product'], true);
    $main_total = 0;
    // show_array($value);
    foreach ($value['product'] as $item) {
        $main_total += $item['sub_total'];
    }
    $value['main_total'] = $main_total;
}

// show_array($total_list_order);
$total_sales = 0;
foreach ($total_list_order as &$value) {
    $total_sales += $value['main_total'];
}

?>
<style>
    span.progress {
        width: 82px;
        height: 23px;
    }

    .box_total {
        border: 1px solid black;
        height: 150px;
        border-radius: 0.2rem;
    }

    .box_total .card-header {
        text-transform: uppercase;
        font-weight: 500;
    }

    .box_total .card-title {
        font-size: 25px;
    }

    .bg-successs {
        background: #4cd137;
    }


    select#progress {
        background-color: white;
    }

    select#progress option[value="0"] {
        background-color: gray;
    }

    select#progress option[value="1"] {
        background-color: lightblue;
    }

    select#progress option[value="2"] {
        background-color: lightgreen;
    }

    select#progress option[value="3"] {
        background-color: red;
    }
</style>
<div id="main-content-wp" class="list-product-page">
    <div class="wrap clearfix">
        <?php get_sidebar() ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="row">
                    <div class="col-md-3">
                        <div class="box_total bg-primary text-white">
                            <div class="card-header">
                                ????n h??ng th??nh c??ng
                            </div>
                            <div class="card-body">
                                <div class="card-title amount2">
                                    <?php echo count_amount('tbl_order', '`progress`= "2"') ?>
                                </div>
                                <div class="card-text">
                                    ????n h??ng giao d???ch th??nh c??ng
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="box_total bg-dark text-white">
                            <div class="card-header">
                                Ch??? x??c nh???n
                            </div>
                            <div class="card-body">
                                <div class="card-title amount0">
                                    <?php echo count_amount('tbl_order', '`progress`= "0"') ?>
                                </div>
                                <div class="card-text">
                                    S??? l?????ng ????n h??ng ??ang x??? l??
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="box_total bg-successs text-white">
                            <div class="card-header">
                                Doanh thu
                            </div>
                            <div class="card-body">
                                <div class="card-title total_sales">
                                    <?php
                                    echo price($total_sales, 'VN??') ?>
                                </div>
                                <div class="card-text">
                                    T???ng doanh s??? h??? th???ng
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="box_total bg-danger text-white">
                            <div class="card-header">
                                ????n h??ng h???y
                            </div>
                            <div class="card-body">
                                <div class="card-title amount3">
                                    <?php echo count_amount('tbl_order', '`progress`= "3"') ?>
                                </div>
                                <div class="card-text">
                                    S??? ????n b??? h???y trong h??? th???ng
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Danh s??ch ????n h??ng</h3>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <div class="filter-wp clearfix">
                        <ul class="post-status fl-left">
                            <li class="all"><a href="">T???t c??? <span class="count"><?php echo '(' . count_amount('tbl_order') . ')'; ?></span></a> |</li>
                            <li class="publish"><a href="">Ch??? x??c nh???n<span class="count"><?php echo '(' . count_amount('tbl_order', "`progress` = '0' ") . ')'; ?></span></a> |</li>
                            <li class="pending"><a href="">??ang giao<span class="count"><?php echo '(' . count_amount('tbl_order', "`progress` = '1' ") . ')'; ?></span> |</a></li>
                            <li class="pending"><a href="">Th??nh c??ng<span class="count"><?php echo '(' . count_amount('tbl_order', "`progress` = '2' ") . ')'; ?></span> |</a></li>
                            <li class="pending"><a href="">???? h???y<span class="count"><?php echo '(' . count_amount('tbl_order', "`progress` = '3' ") . ')'; ?></span></a></li>
                        </ul>
                        <form method="GET" class="form-s fl-right">
                            <input type="text" name="s" id="s">
                            <input type="submit" name="sm_s" value="T??m ki???m">
                        </form>
                    </div>
                    <form method="POST" action="" class="form-actions">
                        <div class="actions">
                            <select name="actions" class="btn-dark">
                                <option value="">T??c v???</option>
                                <option value="0">Ch??? x??c nh???n</option>
                                <option value="1">??ang giao</option>
                                <option value="2">Th??nh c??ng</option>
                                <option value="3">H???y</option>
                            </select>
                            <input type="submit" name="sm_action" value="??p d???ng">
                        </div>
                        <div class="table-responsive">
                            <table class="table list-table-wp">
                                <thead>
                                    <tr>
                                        <td><input type="checkbox" name="checkAll" id="checkAll"></td>
                                        <td><span class="thead-text">STT</span></td>
                                        <td><span class="thead-text">M?? ????n h??ng</span></td>
                                        <td><span class="thead-text">H??? v?? t??n</span></td>
                                        <td><span class="thead-text">S??? s???n ph???m</span></td>
                                        <td><span class="thead-text">T???ng gi??</span></td>
                                        <td><span class="thead-text">Tr???ng th??i</span></td>
                                        <td><span class="thead-text">Th???i gian</span></td>
                                        <td><span class="thead-text">Chi ti???t</span></td>
                                        <td><span class="thead-text">T??c v???</span></td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    global $start;
                                    foreach ($list_order as &$value) {
                                        $start++ ?>
                                        <tr>
                                            <td><input type="checkbox" name="checkItem[]" class="checkItem" value="<?php echo $value['id'] ?>"></td>
                                            <td><span class="tbody-text"><?php echo $start ?></h3></span>
                                            <td><span class="tbody-text"><a href="<?php echo $value['url_detail'] ?>" class="text-dark"><?php echo $value['code_bill'] ?></a></h3></span>
                                            <td>
                                                <div class="tb-title fl-left">
                                                    <a href="<?php echo $value['url_detail'] ?>" title=""><b><?php echo $value['fullname'] ?></b></a>
                                                </div>
                                            </td>
                                            <td><span class="tbody-text"><?php echo $value['amount'] ?></span></td>
                                            <td><span class="tbody-text text-danger"><b><?php echo price($value['main_total'], 'VN??') ?></b></span></td>
                                            <td>
                                                <span class="tbody-text">
                                                    <select data-id="<?php echo $value['id'] ?>" name="progress.<?php echo $value['id'] ?>" id="progress">
                                                        <option value="">--Ch???n--</option>
                                                        <option value="0" <?php if ($value['progress'] == 0) echo 'selected'; ?>>Ch??? x??c nh???n</option>
                                                        <option value="1" <?php if ($value['progress'] == 1) echo 'selected'; ?>>??ang giao</option>
                                                        <option value="2" <?php if ($value['progress'] == 2) echo 'selected'; ?>>Th??nh c??ng</option>
                                                        <option value="3" <?php if ($value['progress'] == 3) echo 'selected'; ?>>???? h???y</option>
                                                    </select>

                                                </span>
                                            </td>
                                            <td><span class="tbody-text"><?php echo $value['time'] ?></span></td>
                                            <td><a href="<?php echo $value['url_detail'] ?>" title="" class="tbody-text"><b class="text-success">Chi ti???t</b></a></td>
                                            <td>
                                                <span>
                                                    <a href="<?php echo $value['url_delete'] ?>" title="X??a" class="delete"><i class="fa fa-trash text-white px-1 bg-danger p-1 img-rounded" aria-hidden="true"></i></a></li>
                                                </span>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </form>
                </div>
            </div>
            <div class="section" id="paging-wp">
                <div class="section-detail clearfix">
                    <p id="desc" class="fl-left">Ch???n v??o checkbox ????? l???a ch???n t???t c???</p>
                    <?php global $num_pages, $page;
                    echo get_pagging2($num_pages, $page, "?mod=sale&action=list_order") ?>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {
        // $("#progress").change(function() {
        $(document).on('change', '#progress', function() {
            // alert('oke');
            var id = $(this).attr('data-id');
            var progress = $(this).val()

            var data = {
                id: id,
                progress: progress,
            };
            // console.log(data);

            $.ajax({
                url: '?mod=sale&action=update_ajax',
                method: 'POST',
                data: data,
                dataType: 'json',
                success: function(result) {
                    $(".amount2").text(result.amount2);
                    $(".amount3").text(result.amount3);
                    $(".amount0").text(result.amount0);
                    $(".total_sales").text(result.total_sales);
                    // console.log(result);
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status);
                    alert(thrownError);
                }
            });
        });
    });
</script>
<?php get_footer() ?>