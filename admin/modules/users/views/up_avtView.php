<?php get_header() ?>
<style>
    #form_upload {
        display: flex;
    }

    #file_upload {
        color: purple;
    }
</style>
<div id="main-content-wp" class="info-account-page">
    <div class="wrap clearfix">
        <?php get_sidebar('users') ?>
        <div id="content" class="fl-right">
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <div class="section" id="title-page">
                        <div class="clearfix">
                            <h3 id="index" class="fl-left">Cập nhật ảnh đại diện</h3>
                        </div>
                    </div>
                    <form action="?mod=users&action=update_avt" method="POST" id="form_upload" enctype="multipart/form-data">
                        <input type="file" name="file_upload" id="file_upload" onchange="chooseFile(this)">
                        <button type="submit" name="btn-submit" id="btn-submit" class="img-rounded">Cập nhật</button>
                    </form>
                    <br>
                    <hr>
                    <img src="" alt="" id="image" width="200">
                    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
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

                    <?php echo form_error('file_upload') ?>
                    <?php echo notify('success') ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer() ?>