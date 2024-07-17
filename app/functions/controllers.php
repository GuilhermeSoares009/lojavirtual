<?php
require BASE.'/app/functions/cart.php';

$inc = $_REQUEST['inc'] ?? 'home';

return match ($inc) {
    'home' => function() {
        $data = get('products');
        return ['products' => $data , 'name' => 'guilherme'];
    },
    'details' => function() {
        $id = strip_tags(($_GET['id']));

        where('id', '=', $id);
        $product = first('products');

        return ['product' => $product];
    },
    'get-products' => function () {
        echo json_encode(getCart());
    },
    'contact' => function() {
        var_dump('contact');
    },
    'send-contact' => function() {
        var_dump('send-contact  ');
    },
    default => function() {
        var_dump('Not found');
    }
};