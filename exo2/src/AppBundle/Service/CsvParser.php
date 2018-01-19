<?php
/**
 * Created by PhpStorm.
 * User: jean-philippeblond
 * Date: 19/01/2018
 * Time: 10:37
 */

namespace AppBundle\Service;


use AppBundle\Entity\User;
use AppBundle\Enum\UserImportEnum;

class CsvParser implements ParserInterface
{
    public function construct() {

    }

    /**
     * Cette fonction retourne un array contenant les items dévoilés du $filePath
     *
     * @param String $filePath
     * @return array
     */
    public function parse(String $filePath) : array{
        $this->handleFileError($filePath);

        $users = [];
        if (($handle = fopen($filePath, "r")) !== FALSE) {

            while(($data = fgetcsv($handle, 1000, ';')) !== false) {
                $user = new User();
                $user->setUsername($data[UserImportEnum::USERNAME]);
                $user->setRegion($data[UserImportEnum::REGION]);
                $user->setEmail($data[UserImportEnum::EMAIL]);
                $user->setPrenom($data[UserImportEnum::PRENOM]);
                $user->setNom($data[UserImportEnum::NOM]);
                $users[] = $user;
            }
            array_shift($users);
        }

        return $users;
    }

    private function handleFileError(String $filePath) : bool {
        if (!file_exists($filePath)) {
            throw new \Symfony\Component\Filesystem\Exception\FileNotFoundException();
        }
        return false;
    }

}