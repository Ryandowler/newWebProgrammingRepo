<?php

require_once 'Manager.php';
require_once 'Connection.php';
require_once 'ManagerTableGateway.php';


$id = session_id();
if ($id == "") {
    session_start();
}

require 'ensureUserLoggedIn.php';

$connection = Connection::getInstance();
$gateway = new ManagerTableGateway($connection);

$managerID = filter_input(INPUT_POST, 'managerID', FILTER_SANITIZE_STRING);
$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
$managerEmail = filter_input(INPUT_POST, 'managerEmail', FILTER_SANITIZE_STRING);

$gateway->updateManager($managerID, $name, $managerEmail);
header('Location: ManagersTableView.php');

