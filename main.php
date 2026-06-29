<?php

require_once 'DBConnect.php';
require_once 'Contact.php';
require_once 'ContactManager.php';
require_once 'Command.php';

// Initialisation des objets principaux
$pdo = DBConnect::getPDO();
$manager = new ContactManager($pdo);
$command = new Command($manager);

// Boucle principale
while (true) {
    $line = readline("Entrez votre commande : ");
    echo "Vous avez saisi : $line\n";

    if ($line === "list") {
        $command->list();
    } elseif (preg_match('/^detail (\d+)$/', $line, $matches)) {
        $id = (int)$matches[1];
        $command->detail($id);
    } elseif (preg_match('/^create\s+([^,]+),\s*([^,]+),\s*(.+)$/', $line, $matches)) {
        $name = trim($matches[1]);
        $email = trim($matches[2]);
        $phone = trim($matches[3]);
        $command->create($name, $email, $phone);
    } elseif (preg_match('/^delete (\d+)$/', $line, $matches)) {
        $id = (int)$matches[1];
        $command->delete($id);
    } elseif (preg_match('/^modify\s+(\d+),\s*([^,]+),\s*([^,]+),\s*(.+)$/', $line, $matches)) {
        $id = (int)$matches[1];
        $name = trim($matches[2]);
        $email = trim($matches[3]);
        $phone = trim($matches[4]);
        $command->modify($id, $name, $email, $phone);
    } elseif ($line === "help") {
        $command->help();
    } elseif ($line === "quit") {
        echo "Fermeture du programme.\n";
        break;
    }
    else {
        echo "Commande inconnue ou mal formatée.\n";
    }
}