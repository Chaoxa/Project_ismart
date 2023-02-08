<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/reset.css">
    <link rel="stylesheet" href="public/login-reg.css">
    <title>Document</title>
</head>

<body>
    <div id="wp-form-reg">

        <h1 class="register">thiết lập mật khẩu mới</h1>
        <form action="" method="POST" id="form-reg">

            <input type="password" name="password" id="password" placeholder="Password">
            <?php echo form_error('password'); ?>
            <input type="submit" name="btn-new-pass" value="LƯU" id="btn-reset">
            <?php echo form_error('account'); ?>
        </form>
        <a href="?mod=users&action=login" class="login">Đăng nhập</a>
        <a href="?mod=users&action=logout" class="reg">Đăng ký</a>
    </div>
</body>

</html>