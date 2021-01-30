<?php
header('Content-Type: text/html; charset=utf-8');

function __autoload( $className ) {
    include '/classes/' . $className . '.php';
}

define('TPL_DIR', '/tpl/');
define('JSON_DIR', './data/data.json');