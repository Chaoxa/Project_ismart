<?php

function source_url($url = "")
{
    global $link;
    return $link = 'http://localhost/Php%20Master/PROJECT/Project_ismart/ismart.com/' . $url;
}
function base_url($url = "")
{
    global $config;
    return $config['base_url'] . $url;
}

function redirect($url)
{
    if (!empty($url)) {
        header("location: $url");
    }
}

function format_link_image($string, $str_cut = '')
{
    $new_string = ltrim($string, $str_cut);
    return $new_string;
}
