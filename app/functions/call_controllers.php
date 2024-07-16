<?php 

$controller = require BASE.'/app/functions/controllers.php';
require BASE.'/app/functions/is_ajax.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
    $controller();
    die();
}


// $data = $controller();