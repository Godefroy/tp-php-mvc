<?php
namespace Blog\Controllers;
use Blog\Models;
use Blog\Views;
use Blog\Exceptions;

class Post {
    public static function get(int $id) {
        // Récupération des données
        $post = Models\Post::getById($id);
        $comments = Models\Comment::getByPostId($id);

        // Affichage de la page de l'article
        $view = new Views\View('post');
        $view->generate([
            'post' => $post,
            'comments' => $comments
        ]);
    }

    public static function postComment(int $id) {
        if (!isset($_POST['author']) || !isset($_POST['content'])) {
            throw new Exceptions\NotFoundException('Missing parameters');
        }

        // Enregistrement du commentaire
        $error = false;
        $author = $_POST['author'];
        $content = $_POST['content'];
        try {
            Models\Comment::create($id, $author, $content);
            // Reset form
            $author = '';
            $content = '';

        } catch(Exceptions\ValidationException $e) {
            $error = $e->getMessage();
        }

        // Récupération des données
        $post = Models\Post::getById($id);
        $comments = Models\Comment::getByPostId($id);

        // Affichage de la page de l'article
        $view = new Views\View('post');
        $view->generate([
            'post' => $post,
            'comments' => $comments,
            'error' => $error,
            'author' => $author,
            'content' => $content
        ]);
    }
}
