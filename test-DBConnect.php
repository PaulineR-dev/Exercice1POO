<?php
require_once "DBConnect.php";

$testdb = new DBConnect();

var_dump($testdb->getPDO());