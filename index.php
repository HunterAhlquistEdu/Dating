<?php
//Turn on error-reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

//Start a session
session_start();


//Require necessary files
require_once ('vendor/autoload.php');
require_once ('model/data_layer.php');

//initialize F3
$f3 = Base::instance();

$f3->route('GET /',
    function() {
        //Display the home page
        $view = new Template();
        echo $view->render("views/home.html");
    }
);
$f3->route('GET /home',
    function($f3) {
        $f3->reroute('/');
    }
);
$f3->route('GET|POST /create-account',
    function() {
        //clear session
        $_SESSION = array();

        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $_SESSION['firstname'] = $_POST['firstname'];
            $_SESSION['lastname'] = $_POST['lastname'];
            $_SESSION['budget'] = $_POST['budget'];
            $_SESSION['cpu-brand'] = $_POST['cpu-brand'];
            $_SESSION['email'] = $_POST['email'];

            header('location: create-shipping');
        }

        //Render page
        $view = new Template();
        echo $view->render("views/csignup.html");
    }
);
$f3->route('GET|POST /create-shipping',
    function() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $_SESSION['phone'] = $_POST['phone'];
            $_SESSION['state'] = $_POST['state'];
            $_SESSION['address'] = $_POST['address'];
            $_SESSION['postal'] = $_POST['postal'];

            header('location: create-interests');
        }

        //Render page
        $view = new Template();
        echo $view->render("views/cshipping.html");
    }
);
$f3->route('GET|POST /create-interests',
    function($f3) {
        $f3->set('interests', getInterests());


        //Render page
        $view = new Template();
        echo $view->render("views/cinterests.html");
    }
);

$f3->run();