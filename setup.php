<?php

echo "Bienvenue dans le configurateur de projet!\n";
$nomProjet = readline("Nom de votre projet : ");
$framework = readline("Framework souhaité (1 - symfony) : ");
$version = readline("Version du framework souhaité : ");
// $installPhpstan = strtolower(readline("Installer phpstan (1 - oui / 2 - non) : ")) === '1';

if ($framework === '1') {
    shell_exec('composer create-project symfony/skeleton:"'.$version.'.*" '.$nomProjet);
}

/*if ($installPhpstan) {
    shell_exec("cd $nomProjet && composer require --dev phpstan/phpstan");
}*/

$cheminProjet = realpath($nomProjet);
$newPath = str_replace('php-quick-start', '', $cheminProjet);

rename($cheminProjet, $newPath);

chdir('..');

shell_exec("rm -rf php-quick-start");