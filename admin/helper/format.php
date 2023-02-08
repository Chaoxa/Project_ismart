<?php
function price($price,$unit = ""){
     return number_format($price).' '.$unit;
}

function control($manager)
{
    $control = array(
        'governor' => 'Toàn quyền',
        'sale-manager' => 'Quản lý sales',
        'page-manager' => 'Quản lý pages',
        'display-manager' => 'Quản lý giao diện'
    );
    if (array_key_exists($manager, $control)) {
        return $control[$manager];
    }
}
?>