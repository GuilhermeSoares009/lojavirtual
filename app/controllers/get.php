<?php 

return match ($inc) {
    'home' => function () {
        $data = get('products');
        return ['products' => $data, 'title' => 'Home'];
    },
    'details' => function () {
        $id = strip_tags(($_GET['id']));

        where('id', '=', $id);
        $product = first('products');

        return ['product' => $product];
    },
    'get-products' => function () {
        echo json_encode(getCart());
    },
    'contact' => function () {
        var_dump('contact');
    },
    'login' => function(){
        return ['title' => 'Login'];
    },
    'logout' => function(){
       logout();
       die();
    },
    'cart' => function(){
        $products = getCart();

        return ['title' => 'Cart', 'products' => $products];
    },
    'cart-remove' => function () {

        $id = strip_tags($_GET['id']);

        removeFromCartint($id);
    },
    default => function () {
        var_dump('rooute not found');
    }
};