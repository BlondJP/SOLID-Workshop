<?php

require_once('UserProvider.php');

class Authenticator
{
    private $userProvider;

    public function __construct(UserProvider $userProvider)
    {
        $this->userProvider = $userProvider;
    }

    /**
     * Retourne un objet User $user si cet utilisateur existe
     * 
     * @params String $username, String $password
     * @returns User $user | null
     */
    public function auth(String $username, String $password)
    {
        return $this->userProvider->provide($username, $password);
    }
}