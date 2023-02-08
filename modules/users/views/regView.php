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
        <!-- <?php
                //if (!empty($alert['success'])) {
                // echo "<p class='success'>{$alert['success']}</p>";
                //
                ?> -->
        <h1 class="register">ĐĂNG KÝ</h1>
        <form action="" method="POST" id="form-reg">
            <input type="text" name="username" id="username" value="<?php echo set_value('username') ?>" placeholder="Username"><!-- set_value dubngf để lưu trữ khi đk mà có một cái sai thì cá cái khác vẫn đc lưu trữ đó -->
            <?php echo form_error('username');?>

            <input type="text" name="fullname" id="fullname" value="<?php echo set_value('fullname') ?>" placeholder="Fullname">
            <?php echo form_error('fullname');?>

            <input type="password" name="password" id="password" placeholder="Password">
            <?php echo form_error('password');?>
            <select name="gender" id="gender">
                <option value="">--Giới tính--</option>
                <option value="male">Nam</option>
                <option value="female">Nữ</option>
            </select>
            <?php echo form_error('gender');?>

            <input type="email" name="email" id="email" placeholder="Email" >
            <?php echo form_error('email');?>
            <input type="submit" name="btn-reg" value="Đăng ký" id="btn-reg">
            <?php echo form_error('account');?> 
        </form>
        <a href="?mod=users&action=login" class="login">Đăng nhập</a>
    </div>
</body>

</html>