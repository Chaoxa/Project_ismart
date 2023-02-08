
<?php
function show_array($data)
{
    if (is_array($data)) {
        echo "<pre>";
        print_r($data);
        echo "<pre>";
    }
}

function count_amount($table, $where = '')
{
    $where == '' ? $where = 1 : $where = $where;
    $result = db_fetch_array("SELECT * FROM `$table` WHERE $where");
    return count($result);
}
