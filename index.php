<?php
require 'controllers/controller.php';
require 'models/Model.php';

try {
    // Récupération de l'action (choix du contrôleur) dans l'url
    $action = isset($_GET['action']) ? $_GET['action'] : '';

    if ($action == 'post') {
        // Page Post
        if (!isset($_GET['id']) || !ctype_digit($_GET['id'])) {
            throw new NotFoundException('Post not found');
        }
        $id = (int) $_GET['id'];
        controllerPost($id);

    } else {
        // Page accueil
        controllerHome();
    }

} catch (Exception $e) {
    // Page d'erreur'
    controllerError($e);
}
