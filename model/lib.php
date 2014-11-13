<?php

// Set up basic db access and settings 

error_reporting(E_ERROR);

session_start(); // run to use cookies 

date_default_timezone_set('America/Los_Angeles');

$dbh = new PDO('mysql:host=localhost;dbname=captainslog2', "captainslog2", "EwdcGXALZyhVScrB");
$dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


?>