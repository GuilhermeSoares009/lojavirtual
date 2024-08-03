<?php

function addToCart(int $productId, int $quantity = 1)
{
    if ( !isset($_SESSION['cart']) ) {
        $_SESSION['cart'] = [];
    }

    where('id', '=', $productId);
    $product = first('products', 'price,name,img');

    if (!isset($_SESSION['cart'][$productId])){
        $_SESSION['cart'][$productId] = ['qty' => $quantity,'price'=>$product->price,'subtotal' => $product->price, 'name' => $product->name, 'img' => $product->img];
    }else{
        $qty = $_SESSION['cart'][$productId]['qty'];
        $_SESSION['cart'][$productId] = ['qty' => $qty+=$quantity,'price'=>$product->price, 'subtotal' => $product->price * $qty, 'name' => $product->name, 'img' => $product->img];
    }
}

function getCart() {
    if (isset($_SESSION['cart'])){
        return $_SESSION['cart'];
    }
    return [];
}