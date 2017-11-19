<?php

require_once('Authenticator.php');
require_once('Authorizator.php');
require_once('SessionManager.php');

$sessionManager = new SessionManager(new Authenticator(new UserProvider()), new Authorizator());

if (isset($_POST['username']) && $_POST['username'] !== null && isset($_POST['password']) && $_POST['password'] !== null) {
    $res = $sessionManager->login((String) $_POST['username'], (String) $_POST['password']);
    if ($res === true) {
        //session_start();
        die('Connexion Réussie');
    }
}

require_once('form.php');