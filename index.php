<?php
/**
 * Hunter Ahlquist
 * 5/8/2021
 *
 * F3 initialization index page
 */

//Turn on error-reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

//Require necessary files
require_once ('vendor/autoload.php');
require_once ('model/data_layer.php');
require_once ('model/validations.php');

//Start a session
session_start();


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
    function($f3) {


        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $valid = true;

            //validation and errors
            if (!validName(trim($_POST['firstname'] . ' ' . $_POST['lastname']))) {
                $valid = false;
                $f3->set('nameErr', "Please enter a valid name.");
            }
            if (!validBudget($_POST['budget'])){
                $valid = false;
                $f3->set('budgetErr', "Please enter a budget between 800 and 5000.");
            }
            if (!validEmail($_POST['email'])){
                $valid = false;
                $f3->set('emailErr', "Please enter a valid email address.");
            }
            $_SESSION['firstname'] = trim($_POST['firstname']);
            $_SESSION['lastname']  = trim($_POST['lastname']);
            $_SESSION['budget']    = trim($_POST['budget']);
            $_SESSION['cpubrand']  = trim($_POST['cpu-brand']);
            $_SESSION['email']     = trim($_POST['email']);

            if ($valid) {
                header('location: create-shipping');
            }
        }

        //Render page
        $view = new Template();
        echo $view->render("views/csignup.html");
    }
);
$f3->route('GET|POST /create-shipping',
    function() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $valid = true;

            if ($valid){
                $_SESSION['phone'] = $_POST['phone'];
                $_SESSION['state'] = $_POST['state'];
                $_SESSION['city'] = $_POST['city'];
                $_SESSION['address'] = $_POST['address'];
                $_SESSION['postal'] = $_POST['postal'];

                header('location: create-interests');
            }
        }

        //Render page
        $view = new Template();
        echo $view->render("views/cshipping.html");
    }
);
$f3->route('GET|POST /create-interests',
    function($f3) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $_SESSION['interests'] = $_POST['interests'];

            header('location: review');
        }

        $f3->set('interests', getInterests());

        //Render page
        $view = new Template();
        echo $view->render("views/cinterests.html");
    }
);
$f3->route('GET|POST /review',
    function($f3) {
        $f3->set('chosenInterests', $_SESSION['interests']);

        //Render page
        $view = new Template();
        echo $view->render("views/profilereview.html");
    }
);

$f3->run();