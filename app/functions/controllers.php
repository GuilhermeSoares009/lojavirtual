<?php

$inc = $_GET['inc'] ?? 'home';

return match ($inc) {
    'home' => function() {
        var_dump('home');
    },
    'contact' => function() {
        var_dump('contact');
    },
    default => function() {
        var_dump('Not found');
    }
};