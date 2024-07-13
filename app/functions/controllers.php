<?php

$inc = $_GET['inc'] ?? 'home';

return match ($inc) {
    'home' => function() {
        where('id', '>', 2);
        get('products');
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