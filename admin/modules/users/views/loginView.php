<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="public/login.css">

    <title>Đăng nhập</title>
</head>

<body>
    <div id="wrapper">
        <form action="" id="form-login" method="POST">
            <h1 class="form-heading">Đăng nhập</h1>
            <div class="form-group">
                <i class="far fa-user icon"></i>
                <input type="text" class="form-input" placeholder="Tên đăng nhập" name="username" value="<?php echo set_value('username') ?>">
            </div>
            <div class="form-group">
                <i class="fas fa-key"></i>
                <input type="password" class="form-input" placeholder="Mật khẩu" name="password">
                <div id="eye">
                    <i class="far fa-eye icon"></i>
                </div>
            </div>
            <input type="checkbox" name="remember_me" id="remember_me">
            <label for="remember_me" class="remember">Nhớ đăng nhập</label>
            <input type="submit" value="Đăng nhập" class="form-submit mb-2" name="btn-submit">
            <style>
                .error {
                    color: red;
                }
            </style>
            <?php echo form_error('username') ?>
            <?php echo form_error('password') ?>
            <?php echo form_error('login'); ?>
            <div class="support d-flex justify-content-between mt-2">
                <a href="?mod=users&controller=team&action=reset">Quên mật khẩu?</a>
            </div>
        </form>
</body>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script>
    $(document).ready(function() {
        $('#eye').click(function() {
            $(this).toggleClass('open');
            $(this).children('i').toggleClass('fa-eye-slash fa-eye');
            if ($(this).hasClass('open')) {
                $(this).prev().attr('type', 'text');
            } else {
                $(this).prev().attr('type', 'password');
            }
        });
    });
</script>
<script src="js/app.js"></script>

</html>