<?php

function construct()
{
    //    echo "DÙng chung, load đầu tiên";
    load_model('index');
}

function blogAction()
{
    $list_blog = get_list_blog();
    $data['list_blog'] = $list_blog;
    load_view('blog', $data);
}

function detail_blogAction()
{
    $id = $_GET['id'];
    $blog = db_fetch_row("SELECT * FROM `blog` WHERE `id` = $id");
    $data['blog'] = $blog;
    load_view('detail_blog', $data);
}
