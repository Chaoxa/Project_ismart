<?php

function get_list_admin()
{
    return db_fetch_array("SELECT * FROM `guest` WHERE 1");
}

function add_user_login($username, $data)
{
    db_insert('guest', $data, $username);
}

function update_user_login($data, $id)
{
    db_update('guest', $data, "`users_id` = $id");
}
function delete_user_login($id)
{
    db_delete('guest', "`users_id` = $id");
}
function get_user_by_username($id)
{
    return db_fetch_row("SELECT * FROM `guest` WHERE `users_id` = '$id'");
}
function user_exists($username){
    $check_user = db_num_rows("SELECT * FROM `guest` WHERE `username` = '{$username}'");
    if($check_user > 0){
        return true;
    }else{
        return false;
    }
}
