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

        return $contacts;
    }

    public function findById(int $id): ?Contact
    {
        $statement = $this->pdo->prepare("SELECT * FROM contact WHERE id = :id");
        $statement->execute(['id' => $id]);
        $data = $statement->fetch(PDO::FETCH_ASSOC);

        if (!$data) {
            return null;
        }

        return new Contact(
            $data['id'],
            $data['name'],
            $data['email'],
            $data['phone_number']
        );
    }

    public function create(string $name, string $email, string $phone): void
    {
        $statement = $this->pdo->prepare("
            INSERT INTO contact (name, email, phone_number)
            VALUES (:name, :email, :phone)
        ");

        $statement->execute([
            'name' => $name,
            'email' => $email,
            'phone' => $phone
        ]);
    }

    public function delete(int $id): void
    {
        $statement = $this->pdo->prepare("DELETE FROM contact WHERE id = :id");
        $statement->execute(['id' => $id]);
    }

   }