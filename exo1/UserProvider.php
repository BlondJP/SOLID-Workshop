<?php

require_once('User.php');

class UserProvider
{
    private $users;

    public function __construct()
    {
        $this->users = [];
        $this->users[] = new User('MT7532', sha1('lol123'));
        $this->users[] = new User('ZX7533', sha1('mdr1111'));
        $this->users[] = new User('SW7531', sha1('ddsf432'));
        $this->users[] = new User('GV7539', sha1('azerty123++'));
        $this->users[] = new User('KL7538', sha1('qwerty456++'));
        $this->users[] = new User('OP7537', sha1('dfdsf334443'));
        $this->users[] = new User('NB7530', sha1('JGJHGGH87876'));
    }

    /**
     * Retourne l'utilisateur désigné
     * 
     * @params String $username, String $password
     * @returns User $user | null;
     */
    public function provide(String $username, String $password)
    {        
        foreach ($this->users as $user) {
            if ($user->username == $username && $user->password == sha1($password)) {
                return $user;
            }
        }

        return null;
    }
}