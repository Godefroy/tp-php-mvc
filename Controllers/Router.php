<?php
namespace Blog\Controllers;

class Router {
    public static function init() {
        try {
            // Récupération de l'action (choix du contrôleur) dans l'url
            $action = isset($_GET['action']) ? $_GET['action'] : '';

            if ($action == 'post') {
                // Page Post
                if (!isset($_GET['id']) || !ctype_digit($_GET['id'])) {
                    throw new \Blog\Exceptions\NotFoundException('Post not found');
                }
                $id = (int)$_GET['id'];
                Post::get($id);

            } else if ($action == 'postComment') {
                // Envoi d'un commentaire
                if (!isset($_GET['id']) || !ctype_digit($_GET['id'])) {
                    throw new \Blog\Exceptions\NotFoundException('Post not found');
                }
                $id = (int) $_GET['id'];
                Post::postComment($id);

            } else {
                // Page accueil
                Main::home();
            }

        } catch (\Exception $e) {
            // Page d'erreur
            Main::error($e->getMessage());
        }

    }
}
