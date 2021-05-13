<?php
//Turn on error-reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

//Start a session
session_start();


//Require necessary files
require('vendor/autoload.php');

//initialize F3
$f3 = Base::instance();

$f3->route('GET /',
    function() {
        //Display the home page
        $view = new Template();
        echo $view->render("views/home.html");
    }
);
$f3->route('GET /create-account',
    function() {
        //Display the home page
        $view = new Template();
        echo $view->render("views/csignup.html");
    }
);
$f3->route('GET /create-shipping',
    function() {
        include "views/cshipping.html";
    }
);
$f3->route('GET /create-interests',
    function() {
        include "views/cinterests.html";
    }
);
$f3->run();