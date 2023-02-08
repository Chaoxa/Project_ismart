<?php
function check_login($username,$password){
    $list_users = db_fetch_array("SELECT * FROM `guest` WHERE `is_active` = '1' ");
    foreach($list_users as $user){
        if($username == $user['username'] && md5($password) == $user['password']){
            return true;
            return false;
        }
    }
}

function user_exists($username,$email){
    $check_user = db_num_rows("SELECT * FROM `guest` WHERE `email` = '$email' OR `username` = '{$username}'");
    if($check_user > 0){
        return true;
    }else{
        return false;
    }
}

function email_exists($email){
    $check_email = db_num_rows("SELECT * FROM `guest` WHERE `email` = '$email'");
    if($check_email > 0){
        return true;
    }else{
        return false;
    }
}

function is_login(){ 
    if(!isset($_SESSION['is_login']))
        return true;
        return false;
}

function check_token_active($token_active){
    $check_user = db_num_rows("SELECT * FROM `guest` WHERE `token_active` = '$token_active' AND `is_active` = '0'");
    if($check_user > 0){
        return true;
    }else{
        return false;
    }
}

function check_reset_token($reset_token){
    $check_reset_token = db_num_rows("SELECT * FROM `guest` WHERE `reset_token` = '$reset_token'");
    if($check_reset_token > 0){
        return true;
    }else{
        return false;
    }
}

function update_reset_token($data,$email){
    db_update('guest',$data,"`email` = '{$email}'");
}

function update_password($data,$reset_token){
    db_update('guest',$data,"`reset_token` = '$reset_token'");
}


