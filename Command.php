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
            echo $contact->toString() . "\n";
        }
    }

    public function detail(int $id): void
    {
        $contact = $this->manager->findById($id);

        if ($contact === null) {
            echo "Aucun contact trouvé pour l'id $id\n";
            return;
        }

        echo $contact->toString() . "\n";
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

}
