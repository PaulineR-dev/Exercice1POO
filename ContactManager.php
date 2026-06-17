<?php

class ContactManager
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function findAll(): array
    {
        $sql = "SELECT * FROM contact";
        $statement = $this->pdo->prepare($sql);
        $statement->execute();

        $rows = $statement->fetchAll(PDO::FETCH_ASSOC);


        $contacts = [];

        foreach ($rows as $row) {
            $contact = new Contact(
                $row['id'],
                $row['name'],
                $row['email'],
                $row['phone_number']
            );

            $contacts[] = $contact;
        }

        
        var_dump($contacts);

        return $contacts;
    }
}