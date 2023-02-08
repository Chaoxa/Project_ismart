<?php
function add_cart($id)
{
    $item = get_detail_product($id);
    $qty = 1;
    if (isset($_SESSION['cart']) && array_key_exists($id, $_SESSION['cart']['buy'])) {
        $qty = $_SESSION['cart']['buy'][$id]['qty'] + 1;
    }

    $_SESSION['cart']['buy'][$id] = array(
        'id' => $item['id'],
        'new_price' => $item['new_price'],
        'thumb_main' => $item['thumb_main'],
        'product_name' => $item['product_name'],
        'product_code' => $item['product_code'],
        'qty' => $qty,
        'sub_total' => $qty * $item['new_price'],
    );
    update_cart();
}
function get_total_cart()
{
    if (isset($_SESSION['cart'])) {
        return $_SESSION['cart']['total']['total'];
    }
    return false;
}

function update_cart()
{
    if (isset($_SESSION['cart'])) {
        $num_order = 0;
        $total = 0;
        foreach ($_SESSION['cart']['buy'] as $item) {
            $num_order += $item['qty'];
            $total += $item['sub_total'];
        }
        $_SESSION['cart']['total'] = array(
            'num_order' => $num_order,
            'total' => $total,
        );
    }
}

function get_list_by_cart()
{
    if (!empty($_SESSION['cart']['buy'])) {
        foreach ($_SESSION['cart']['buy'] as &$item) {
            $item['url_delete_cart'] = "?mod=cart&action=delete&id={$item['id']}";
            $item['url'] = "?mod=product&action=detail_product&id={$item['id']}";
            // return $_SESSION['cart']['buy'][$item['id']] = $item;
        }
        return $_SESSION['cart']['buy'];
    } else {
        return false;
    }
}

function update_cart_qty($qty)
{
    foreach ($qty as $id => $new_qty) {
        $_SESSION['cart']['buy'][$id]['qty'] = $new_qty;
        $_SESSION['cart']['buy'][$id]['sub_total'] = $new_qty * $_SESSION['cart']['buy'][$id]['price'];
    }
    update_cart();
}

function get_detail_product($id)
{
    $list_product = db_fetch_array('SELECT * FROM `tbl_product` WHERE 1');
    foreach ($list_product as $product) {
        if ($product['id'] == $id) {
            $product['url_add_cart'] = "?mod=cart&action=add_cart&id=$id";
            $product['thumb_detail'] = json_decode($product['thumb_detail'], true);
            return $product;
        }
    }
}
