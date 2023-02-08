<?php
function check_login($username, $password)
{
    $list_users = db_fetch_array("SELECT * FROM `guest`");
    foreach ($list_users as $user) {
        if ($username == $user['username'] && md5($password) == $user['password']) {
            return true;
            return false;
        }
    }
}


function is_login()
{
    if (!isset($_SESSION['is_login']))
        return true;
    return false;
}

function check_pass($old_pass, $user_login)
{
    $item = db_fetch_row("SELECT * FROM `guest` WHERE `username` = '$user_login'");
    if (md5($old_pass) == $item['password']) {
        return true;
    } else {
        return false;
    }
}

function get_user_by_username($username){
  return db_fetch_row("SELECT * FROM `guest` WHERE `username` = '$username'");
}

 function update_user_login($username,$data){
    db_update('guest',$data,"`username` = '{$username}'"); 
}

