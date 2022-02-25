<?php

// Ouvrir la session utilisateur
session_start();

// Détruire la session utilisateur
session_destroy();

// Redirection vers la page d'accueil
header ('location: index.php');
exit;






