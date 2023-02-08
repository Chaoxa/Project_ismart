<!DOCTYPE html>

<head>
    <!-- <script src="//cdn.ckeditor.com/4.19.0/full/ckeditor.js"></script> -->
    <script src="ckeditor/ckeditor.js"></script>
    <title>Ckeditor</title>
</head>

<body>
    <style>
        #content {
            width: 960px;
            margin: 0px auto;
        }
    </style>
    <div id="content">
        <h3>Tích hợp ckeditor vào website</h3>
        <form action="" method="POST">
            <textarea class="ckeditor" name="post_content"></textarea>
            <br>
            <input type="submit" name="btn_add" value="Thêm dữ liệu">
        </form>
    </div>
</body>

</html>
<?php
if (isset($_POST['btn_add'])) {
    echo $_POST['post_content'];
}
?>