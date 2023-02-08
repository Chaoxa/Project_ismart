<?php get_header() ?>
<style>
    .add-cat-page #detail-page .section-detail input[type="text"] {
        width: 100%;
    }

    input {
        max-width: 100%;
    }

    #file-upload {
        margin-bottom: 20px;
        color: yellow;
        background: linear-gradient(90deg, rgba(2, 0, 36, 1) 0%, rgba(44, 246, 11, 1) 0%, rgba(4, 206, 244, 1) 77%, rgba(15, 0, 240, 1) 100%);
        border-radius: 0.2rem;
        box-shadow: 1px 1px 10px rebeccapurple;
        border: 1px solid rgb(240, 182, 182);
    }

    #file_upload {
        margin-bottom: 20px;
        color: yellow;
        background: linear-gradient(90deg, rgba(2, 0, 36, 1) 0%, rgba(44, 246, 11, 1) 0%, rgba(4, 206, 244, 1) 77%, rgba(15, 0, 240, 1) 100%);
        border-radius: 0.2rem;
        box-shadow: 1px 1px 10px rebeccapurple;
        border: 1px solid rgb(240, 182, 182);
    }
</style>
<div id="main-content-wp" class="add-cat-page">
    <div class="wrap clearfix">
        <?php get_sidebar() ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Cập nhật sản phẩm</h3>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <?php notify('update_success') ?>
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="product-name">Tên sản phẩm</label>
                                    <input type="text" name="product_name" class="form-control m-0" id="product-name" value="<?php echo $product['product_name'] ?>">
                                    <?php echo form_error('product_name') ?>
                                </div>
                                <div class="col-md-12 p-0">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="old_price">Giá sản phẩm</label>
                                                <input type="text" name="old_price" placeholder="VNĐ" class="form-control" onkeyup="count()" id="old_price" value="<?php echo $product['old_price'] ?>">
                                                <?php echo form_error('old_price') ?>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="discount">Giảm giá % <span class="text-danger">(Không bắt buộc)</span></label>
                                                <input type="text" placeholder="%" name="discount" onkeyup="count()" class="form-control" id="discount" value="<?php echo $product['discount'] ?>">
                                                <?php echo form_error('price') ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <h2 id="error" class="text-danger"></h2>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="amount">Số lượng sản phẩm</label>
                                        <input type="number" id="amount" name="amount" class="form-control" value="<?php echo $product['amount'] ?>">
                                        <?php echo form_error('amount') ?>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="new_price" class="text-success">Thành tiền:</label>
                                        <input type="text" id="new_price" name="new_price" class="form-control m-0" value="<?php echo $product['new_price'] ?>">
                                        <?php echo form_error('new_price') ?>
                                    </div>
                                </div>
                                <script>
                                    function count() {
                                        var price = document.getElementById('old_price').value;
                                        var discount = document.getElementById('discount').value;
                                        var new_price1 = price * discount / 100;
                                        var new_price = price - new_price1;
                                        if (discount > 100) {
                                            alert('Không thể giảm giá vượt quá 100% giá trị sản phẩm')
                                        } else {
                                            document.getElementById('new_price').value = new_price
                                        }
                                    }
                                </script>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <label for="desc">Mô tả ngắn</label>
                                <textarea name="desc" id="desc" class="ckeditor"><?php echo $product['product_desc'] ?></textarea>
                            </div>
                            <div class="col-md-6 d-inline-block ">
                                <input type="checkbox" id="featured_products" name="featured_products">
                                <label for="featured_products" class="d-inline-block">Hiện ở danh mục sản phẩm nổi bật</label>
                            </div>
                        </div>
                        <?php echo form_error('desc') ?>
                        <label for="detail">Chi tiết</label>
                        <textarea name="detail" id="detail" class="ckeditor"><?php echo $product['product_detail'] ?></textarea>
                        <?php echo form_error('detail') ?>
                        <label class="mt-3">Hình ảnh</label>
                        <label>Danh mục sản phẩm</label>
                        <?php global $parent_id;
                        // $list_cat_child = get_cat_product_by_id(1);
                        // show_array($list_cat_child);
                        ?>
                        <select name="cat_id">

                            <option value="<?php echo $product['cat_id'] ?>"><?php echo format_name_cat_by_number($product['cat_id']) ?></option>
                            <?php foreach ($list_cat_parent as $parent) { ?>
                                <option value="" disabled><i><?php echo '✹' . $parent['tbl_cat_parent_name'] ?></i></option>
                                <?php $list_cat_child = get_cat_product_by_id($parent['id']);
                                foreach ($list_cat_child as $child) {
                                ?>
                                    <option value="<?php echo $child['id'] ?>"><?php echo '✩' . $child['cat_title'] . '✩' ?></option>
                                <?php
                                }
                                ?>
                            <?php } ?>
                        </select>
                        <?php echo form_error('parent_id') ?>
                        <label>Trạng thái</label>
                        <?php global $status; ?>
                        <select name="status" class="mb-2">
                            <option value="">-- Chọn danh mục --</option>
                            <option value="1" <?php if ($status == '1') {
                                                    echo "selected";
                                                } ?>>Chờ phê duyệt</option>
                            <option value="2" <?php if ($status == '2') {
                                                    echo "selected";
                                                } ?>>Đăng công khai</option>
                        </select>
                        <?php echo form_error('status') ?>
                        <?php
                        global $notify;
                        if (empty($notify['update_success'])) { ?>
                            <button type="submit" name="btn-submit" id="btn-submit" class="img-rounded">Cập nhật</button>
                        <?php } else {
                            echo notify('update_success');
                        ?>
                            <a href="?mod=product&action=add_product">
                                <h3>Tạo sản phẩm tiếp theo</h3>
                            </a>
                        <?php
                        } ?>
                    </form>
                    <script>
                        var inputFile = document.querySelector("#file_upload")

                        function chooseFile(fileInput) {
                            if (fileInput.files && fileInput.files[0]) {
                                var reader = new FileReader();

                                reader.onload = function(e) {
                                    $('#image').attr('src', e.target.result)
                                }
                                reader.readAsDataURL(fileInput.files[0]);
                            }
                        }

                        var inputFile = document.querySelector('.img');
                        const fileUpload = document.getElementById('file-upload');
                        fileUpload.addEventListener('change', (event) => {
                            const files = event.target.files;
                            var str = '';
                            for (var i = 0; i < files.length; i++) {
                                var file = files[i];
                                var url = URL.createObjectURL(file);
                                str += "<span><img class = 'img' src='" + url + "' width='80' class='img' </span>"
                            }
                            var blockImages = document.getElementById('images');
                            blockImages.innerHTML = str;
                            // console.log(str)


                        });
                    </script>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer() ?>