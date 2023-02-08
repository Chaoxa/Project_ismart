<?php
#==== PHÂN TRANG =====
function get_pagging0($start = 1, $num_per_page = 10, $table, $where = "")
{
    if (!empty($where)) {
        $where = "WHERE $where";
    }
    $list_user = db_fetch_array("SELECT * FROM `$table` $where LIMIT $start,$num_per_page");
    return $list_user;
};

function get_pagging1($table, $where = '')
{
    global  $num_rows, $num_per_page, $total_rows, $num_pages, $page, $result, $start;
    $num_rows = db_num_rows("SELECT * FROM `$table`");
    $num_per_page = 5;
    $total_rows = $num_rows;
    $num_pages = ceil($total_rows / $num_per_page);

    // echo "Số trang: $num_pages <br>";
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    // echo "Trang: $page";

    $start = ($page - 1) * $num_per_page;
    // echo " <br> Bắt đầu từ: $start"; 

    $result = get_pagging0($start, $num_per_page, $table, $where);
    return $result;
}

function get_pagging2($num_pages, $page, $base_url = "")
{
    $str_pagging = "<ul class=\"pagging float-right\">";
    if ($page > 1) {
        $before = $page - 1;
        $str_pagging .= "<li><a href=\"$base_url&page=$before\">Trước</a></li>";
    }
    for ($i = 1; $i <= $num_pages; $i++) {
        if ($i == $page) {
            $active = "class=\"active\"";
        } else {
            $active = "";
        }
        $str_pagging .= "<li $active ><a href=\"{$base_url}&page={$i}\">$i</a></li>";
    }
    if ($page < $num_pages) {
        $after = $page + 1;
        $str_pagging .= "<li><a href=\"$base_url&page=$after\">Sau</a></li>";
    }
    $str_pagging .= "</ul>";
    return $str_pagging;
}

#==== END PHÂN TRANG =====