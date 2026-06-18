<?php

require_once 'DBConnect.php';
require_once 'Contact.php';
require_once 'ContactManager.php';
require_once 'Command.php';

$pdo = DBConnect::getPDO();
$manager = new ContactManager($pdo);
$command = new Command($manager);

while (true) {
    $line = readline("Entrez votre commande : ");
    echo "Vous avez saisi : $line\n";

    if ($line === "list") {
        $command->list();
    }
}