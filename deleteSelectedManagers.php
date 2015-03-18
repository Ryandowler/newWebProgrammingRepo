<?php
 
echo '<pre>';
print_r($_POST);
echo '</pre>';
 
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
 
$managers = $_POST['managers'];
foreach ($managers as $managerID){
echo '<pre>';
print_r($managerID);
echo '</pre>';
    $gateway->deletemanager($managerID);
}
 
 
    header("Location: ManagersTableView.php");
 
?>