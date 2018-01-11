<?php

namespace AppBundle\Enum;

class UserImportEnum
{
    const USERNAME = 0;
    const NOM = 1;
    const PRENOM = 2;
    const REGION = 3;
    const EMAIL = 4;

    static public function getOrderedHeaders()
    {
        return [
            self::USERNAME => 'username',
            self::NOM => 'nom',
            self::PRENOM => 'prenom',
            self::REGION => 'region',
            self::EMAIL => 'email'
        ];
    }
}