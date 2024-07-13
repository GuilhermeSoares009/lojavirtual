<?php
session_start();

require '../app/constants/constants.php';


require '../app/functions/load.php';

$controller = require '../app/functions/controllers.php';
$controller();

require '../app/views/master.php';