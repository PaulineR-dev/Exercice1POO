<?php

require_once 'DBConnect.php';
require_once 'ContactManager.php';
require_once 'Contact.php';

$db = new DBConnect();
$pdo = $db->getPDO();

$manager = new ContactManager($pdo);
$manager->findAll();