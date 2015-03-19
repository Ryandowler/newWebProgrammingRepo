<?php
//requiring Event.php as some of its elements are needed in this page
require_once 'Manager.php';
require_once 'Connection.php';
require_once 'ManagerTableGateway.php';

/* creates session if theres not already a session*/
$id = session_id();
if ($id == "") {
    session_start();
}

require 'ensureUserLoggedIn.php';

$connection = Connection::getInstance();
$gateway = new ManagerTableGateway($connection);

//validate form data
//removes data that is potentially harmful (filter part)
$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
$managerEmail = filter_input(INPUT_POST, 'managerEmail', FILTER_SANITIZE_STRING);
//!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!come back sanitize for email
//if statements to validate form, works with createEvent.php
$errorMessage = array();
if ($name === FALSE || $name === '') {
    $errorMessage['name'] = 'Name must not be blank<br/>';
}
if ($managerEmail === FALSE || $managerEmail === '') {
    $errorMessage['managerEmail'] = 'Email must not be blank<br/>';
}


$managerID = $gateway->insertManager($name, $managerEmail);
$message = "manager created woohooo";
//header("Location: ManagersTableView.php");

//making sure $username is set and not null
/*
if (!isset($_SESSION['events'])) {
    die("Illegal Request");
} 
else {
    $events = $_SESSION['events'];
}
*/