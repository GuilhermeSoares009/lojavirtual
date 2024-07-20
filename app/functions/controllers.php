<?php
require BASE.'/app/functions/cart.php';

$inc = $_REQUEST['inc'] ?? 'home';

return match ($inc) {
    'home' => function() {
        // session_destroy();
        $data = get('products');
        return ['products' => $data , 'title' => 'Home'];
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
    'add-to-cart' => function () {
        $product = json_decode(file_get_contents("php://input"));
        addToCart($product->id);

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