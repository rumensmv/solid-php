<?php

require_once 'RepositoryInterface.php';
require_once 'User.php';
require_once 'DatabaseInterface.php';

class UserRepository implements RepositoryInterface
{
    private DatabaseInterface $client;

    public function __construct(DatabaseInterface $client)
    {
        $this->client = $client;
    }

    public function getUser(string $userEmail) : User
    {
        foreach ($this->client->fetchAll() as $user) {
            $email = is_array($user) ? $user['email'] : $user->email;
            $full_name = is_array($user) ? $user['full_name'] : $user->full_name;

            if ($email === $userEmail) {
                return new User($full_name, $email);
            }
        }

        throw new Exception("Utilisateur non trouvé : $userEmail");
    }

    public function getUsers() : array
    {
         $usersArray = [];
        foreach ($this->client->fetchAll() as $user) {
            $full_name = is_array($user) ? $user['full_name'] : $user->full_name;
            $email = is_array($user) ? $user['email'] : $user->email;
            $usersArray[] = new User($full_name, $email);
        }
        return $usersArray;
    }
}