<h1>Exo2</h1>

<h2>But de l'exercice</h2>
<p>Le but de cet exercice est de construire un système d'import test par test.</p>
<p>Démarche : lire les tests unitaires dans l'ordre. Puis Ecrire les classes qui les valideront.</p>

<h2>Pour lancer les Tests unitaires</h2>
<ul>
    <li>1) phpunit --colors=always tests/AppBundle/Enum</li>
    <li>2) phpunit --colors=always tests/AppBundle/Service/CsvParserTest.php</li>
    <li>3) phpunit --colors=always tests/AppBundle/Service/MysqlGatewayTest.php</li>
    <li>4) phpunit --colors=always tests/AppBundle/Service/UserImportServiceTest.php</li>
    <li>3) phpunit --colors=always tests/AppBundle/Command</li>
    <li>5) phpunit --colors=always tests/</li>
</ul>

<h2>Une fois les tests au vert, lancer l'import</h2>
<ul>
    <li>1) soyez sur que user.csv est dans le dossier exo2/</li>
    <li>2) php bin/console solid:import-user</li>
</ul>