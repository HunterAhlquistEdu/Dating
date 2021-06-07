<?php
class Controller {
    function homeView() {
        //Display the home page
        $view = new Template();
        echo $view->render("views/home.html");
    }

    function createView($f3) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $valid = true;

            //validation and errors
            if (!validName(trim($_POST['firstname'] . ' ' . $_POST['lastname']))) {
                $valid = false;
                $f3->set('nameErr', "Please enter a valid name.");
            }
            if (!validBudget($_POST['budget'])){
                $valid = false;
                $f3->set('budgetErr', "Please enter a budget between $800 and $5000.");
            }
            if (!validEmail($_POST['email'])){
                $valid = false;
                $f3->set('emailErr', "Please enter a valid email address.");
            }

            if ($valid) {
                $member = null;
                if ($_POST['plus']) {
                    $member = new prosPlus(trim($_POST['firstname']), trim($_POST['lastname']), trim($_POST['budget']),
                        trim($_POST['cpu-brand']), trim($_POST['email']));
                    $member->setServAddons([true, true]);
                    $_SESSION['member'] = $member;
                } else {
                    $member = new Member(trim($_POST['firstname']), trim($_POST['lastname']), trim($_POST['budget']),
                        trim($_POST['cpu-brand']), trim($_POST['email']));
                    $_SESSION['member'] = $member;
                }

                $f3->reroute('/create-shipping');
            }
        }

        //Render page
        $view = new Template();
        echo $view->render("views/csignup.html");
    }

    function shippingView($f3) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $valid = true;

            if ($valid){
                $_SESSION['member']->setPhone(trim($_POST['phone']));
                $_SESSION['member']->setFullAddress(trim($_POST['address']), trim($_POST['city']), trim($_POST['state']), trim($_POST['postal']));

                $f3->reroute('/create-interests');
            }
        }

        //Render page
        $view = new Template();
        echo $view->render("views/cshipping.html");
    }

    function interestsView($f3) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $_SESSION['interests'] = $_POST['interests'];
            if (get_class($_SESSION['member']) == ProsPlus::class) {
                $deals = [$_POST['office'], $_POST['adobe'], $_POST['ssd']];
                $_SESSION['member']->setDealAddons($deals);
            }


            $f3->reroute('/review');
        }

        $f3->set('interests', getInterests());

        //Render page
        $view = new Template();
        echo $view->render("views/cinterests.html");
    }

    function reviewView($f3) {
        $f3->set('member', $_SESSION['member']);
        $f3->set('chosenInterests', $_SESSION['interests']);

        //Render page
        $view = new Template();
        echo $view->render("views/profilereview.html");
    }

    function privacyView() {
        //get zuck'd
        echo "<img src='https://encrypted-tbn2.gstatic.com/images?q=tbn:ANd9GcTsMrpBjxQX8uJCryNVI6Gvc_jPd6QtzDJF8C-p3RQmcu269bKd'>";
    }
}