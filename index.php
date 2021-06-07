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

//Start a session
session_start();

//initialize F3
$f3 = Base::instance();

$f3->route('GET /', 'Controller->homeView');
$f3->redirect('GET|HEAD /home', '/');
$f3->route('GET|POST /create-account', 'Controller->createView');
$f3->route('GET|POST /create-shipping', 'Controller->shippingView');
$f3->route('GET|POST /create-interests', 'Controller->interestsView');
$f3->route('GET|POST /review', 'Controller->reviewView');
$f3->route('GET /privacy', 'Controller->privacy');

$f3->run();