<?php
// Start Session
session_start();

// Include Config
require('config.php');

require('classes/Messages.php');
require('classes/Bootstrap.php');
require('classes/Controller.php');
require('classes/Model.php');

require('controllers/home.php');
require('controllers/computador.php');
require('controllers/user.php');

require('models/home.php');
require('models/computador.php');
require('models/user.php');
require('core/util.php');
require('core/fpdf181/fpdf.php');


$bootstrap = new Bootstrap($_GET);
$controller = $bootstrap->createController();
if($controller){
	$controller->executeAction();
}
