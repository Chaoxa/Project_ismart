<?php
//domain.com?mod=home&controller=index&action=index

function construct(){
    load_model('home');
    
}
function indexAction(){
    // echo base_url("?mod=media&action=upload_single");

   
    load_view('index');
}

function addAction(){
    
}

function updateAction(){
    
}