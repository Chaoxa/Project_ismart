<?php get_header() ?>
<div id="main-content-wp" class="add-cat-page slider-page">
    <div class="wrap clearfix">
        <?php get_sidebar() ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Thêm Slider</h3>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <form method="POST" enctype="multipart/form-data">
                        <label for="slug">Link dẫn slider <span class="text-danger">(Không bắt buộc)</span></label>
                        <input type="text" name="slug" id="slug" value="<?php echo set_value('slug') ?>">
                        <label for="sort">Thứ tự</label>
                        <input type="number" name="sort" min=1 max=10 id="sort-order" class="mb-2" value="<?php echo set_value('sort') ?>">
                        <?php echo form_error('sort') ?>
                        <label>Hình ảnh</label>
                        <div id="uploadFile">
                            <input type="file" name="file_upload" id="file_upload" onchange="chooseFile(this)">
                            <img src="public/images/img-thumb.png" alt="" id="image" class="img-rounded my-2" width="300">
                            <?php echo form_error('file_upload') ?>
                        </div>
                        <button type="submit" name="btn-submit" id="btn-submit" class="mt-4 btn btn-success">Thêm</button>
                    </form>
                </div>
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
                </script>
            </div>
        </div>
    </div>
</div>
<?php get_footer() ?>