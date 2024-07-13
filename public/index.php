<?php
session_start();

require '../app/constants/constants.php';


require '../app/functions/load.php';

$controller = require '../app/functions/controllers.php';
$controller();

try {
    require '../app/views/master.php';
} catch (\Throwable $th) {
    echo $th->getMessage();
}
