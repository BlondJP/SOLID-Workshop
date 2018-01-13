<h1>SOLID by TDD</h1>

<h2>But du Workshop</h2>
<p>Le but de ce workshop est de guider les participants vers l'implémentation de SOLID. Pour cela ils devront valider des tests unitaires pré-écrits.</p>
<p>Démarche : lire les tests unitaires de chaque exercice. Puis Ecrire les classes necessaires pour les valider.</p>

<h2>Pour lancer les Tests unitaires</h2>
<p>phpunit --colors=always exo0/TestApple.php</p>

<h2>Pour installer PHP 7.2 sur Mac</h2>
<p>
<ul>
    <li>curl -s http://php-osx.liip.ch/install.sh | bash -s 7.2</li>
    <li>export PATH=/usr/local/php5/bin:$PATH</li>
    <li>php -v</li>
    <li>https://jason.pureconcepts.net/2016/09/upgrade-php-mac-os-x/</li>
</ul>
</p>

<h2>Pour installer PHPUnit sur Mac</h2>
<p>
<ul>
    <li>curl https://phar.phpunit.de/phpunit-6.4.phar  -L -o phpunit.phar</li>
    <li>chmod +x phpunit.phar</li>
    <li>mv phpunit.phar /usr/local/bin/phpunit</li>
    <li>phpunit -v</li>
</ul>
</p>