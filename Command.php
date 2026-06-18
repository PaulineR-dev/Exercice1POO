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
}
