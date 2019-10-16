<?php
// error_reporting(E_ALL ^ E_DEPRECATED);
// mysql_select_db('project_db', mysql_connect('localhost', 'root', '')) or die(mysql_error());

$databaseHost = 'localhost';
$databaseName = 'payroll_db';
$databaseUsername = 'root';
$databasePassword = '';

$mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);