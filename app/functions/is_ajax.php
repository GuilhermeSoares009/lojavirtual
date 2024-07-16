<?php 

function is_ajax(){
    return isset($_SERVER['X-Resquested-With']) and $_SERVER['X-Requested-With'] === 'XMLHttpRequest';
}