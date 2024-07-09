<?php

session_start();

require '../app/constants/constants.php';

require '../app/functions/controllers.php';

$controller = require '../app/functions/controllers.php';
$controller();