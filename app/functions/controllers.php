<?php

$inc = $_GET['inc'] ?? 'home';

return match ($inc) {
    'home' => function() {
        $data = get('products');
        return ['products' => $data , 'name' => 'guilherme'];
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