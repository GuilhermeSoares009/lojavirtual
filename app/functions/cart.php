<?php

function addToCart(int $productId, int $quantity = 1)
{
    if ( !isset($_SESSION['cart']) ) {
        $_SESSION['cart'] = [];
    }

    where('id', '=', $productId);
    $product = first('products', 'id,price,name,img');

    if (!isset($_SESSION['cart'][$productId])){
        $_SESSION['cart'][$productId] = ['id' => $product->id,'qty' => $quantity,'price'=>$product->price,'subtotal' => $product->price, 'name' => $product->name, 'img' => $product->img];
    }else{
        $qty = $_SESSION['cart'][$productId]['qty'];
        $_SESSION['cart'][$productId] = ['id' => $product->id,'qty' => $qty+=$quantity,'price'=>$product->price, 'subtotal' => $product->price * $qty, 'name' => $product->name, 'img' => $product->img];
    }
}

function getCart() {
    if (isset($_SESSION['cart'])){
        return $_SESSION['cart'];
    }
    return [];
}
function removeFromCartint ($productId) {
    if (isset($_SESSION['cart'][$productId])){
        unset($_SESSION['cart'][$productId]);
    }
    return [];
}