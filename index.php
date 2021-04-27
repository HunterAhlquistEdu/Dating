<?php
//initialize F3
require('vendor/autoload.php');
$f3 = \Base::instance();
$f3->route('GET /',
    function() {
        include "views/home.html";
    }
);
$f3->run();