<?php

require_once 'DBConnect.php';
require_once 'Contact.php';
require_once 'ContactManager.php';

$db = new DBConnect();
$pdo = $db->getPDO();


while (true) {
    $line = readline("Entrez votre commande : ");
    echo "Vous avez saisi : $line\n";

    if ($line === "list") {
        $manager = new ContactManager($pdo);
        $contacts = $manager->findAll();

        foreach ($contacts as $contact) {
            echo $contact->toString() . "\n";
        }
    }
}