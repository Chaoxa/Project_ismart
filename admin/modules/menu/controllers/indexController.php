<?php
//domain.com?mod=home&controller=index&action=index

function construct(){
    load_model('index');
    load('lib', 'validation');
}
function indexAction(){
    // echo base_url("?mod=media&action=upload_single");

   
    load_view('index');
}

function menuAction(){
    global $error, $menu_name, $slug, $parent_id, $list_menu;
    ///add menu============
    if (isset($_POST['sm_add'])) {
        $error = array();
        
        //tiêu đề
        if (empty($_POST['menu_name'])) {
            $error['menu_name'] = "(*) Bạn chưa nhập tên menu!";
        } else {
            $menu_name = $_POST['menu_name'];
        }
        // print_r($_POST);
        //kiểm ttra link thân thiện
        if (empty($_POST['slug'])) {
            $error['slug'] = "(*) Bạn chưa nhập đường link thân thiện !";
        } else {
            $slug = $_POST['slug'];
        }
        #Kiểm tra nội dung  trang
        if (empty($_POST['parent_id'])) {
            $error['parent_id'] = "(*) Bạn chưa nhập thứ tự !";
        } else {
            $parent_id = $_POST['parent_id'];
        }

       

        //kết luận
        if (empty($error)) {
            $data = array(
                'menu_name' => $menu_name,
                'slug' => $slug,
                'parent_id' => $parent_id,
                'created_date' => time(),
                
                
            );
            $insert = db_insert('tbl_menu', $data);
        }
        
    }

    $list_menu = get_list_menu();
    $send_data['list_menu'] = $list_menu;
    load_view('menu', $send_data);
}

function updateAction(){
    
}