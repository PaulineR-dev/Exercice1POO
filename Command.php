<?php

class Command
{
    private ContactManager $manager;

    public function __construct(ContactManager $manager)
    {
        $this->manager = $manager;
    }

    public function list(): void
    {
        $contacts = $this->manager->findAll();

        foreach ($contacts as $contact) {
            echo $contact . "\n";
        }
    }

    public function detail(int $id): void
    {
        $contact = $this->manager->findById($id);

        if ($contact === null) {
            echo "Aucun contact trouvé pour l'id $id\n";
            return;
        }

        echo $contact . "\n";
    }

    public function create(string $name, string $email, string $phone): void
    {
        $this->manager->create($name, $email, $phone);
        echo "Contact créé : $name, $email, $phone\n";
    }

    public function delete(int $id): void
    {
        $this->manager->delete($id);
        echo "Contact supprimé (id : $id)\n";
    }

    public function modify(int $id, string $name, string $email, string $phone): void
    {
        $this->manager->modify($id, $name, $email, $phone);
        echo "Contact modifié (id : $id)\n";
    }

    public function help(): void
    {
        echo "Commandes disponibles :\n";
        echo "help : affiche cette aide\n";
        echo "list : liste tous les contacts\n";
        echo "detail [id] : affiche le détail d’un contact\n";
        echo "create [name], [email], [phone] : crée un contact\n";
        echo "delete [id] : supprime un contact\n";
        echo "modify [id], [name], [email], [phone] : modifie un contact\n";
    }
}