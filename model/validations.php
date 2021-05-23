<?php
function validName($name) {
    return preg_match("/^[a-zA-Z-' ]*$/", $name);
}

function validBudget($budget) {
    return ($budget >= 800 && $budget <= 5000);
}

function validPhone($phone) {
    return preg_match("/^(\+\d{1,2}\s)?\(?\d{3}\)?[\s.-]\d{3}[\s.-]\d{4}$/", $phone);
}

function validEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

function validUses($uses) {

}

