<?php
namespace Blog\Controllers;
use Blog\Models;
use Blog\Views;

class Main {
    public static function home() {
        $posts = Models\Post::getAll();

        $view = new Views\View('home');
        $view->generate([
            'posts' => $posts
        ]);
    }

    public static function error(string $message) {
        // Log
        file_put_contents('errors.log', date('c') . ' - ' . $message . "\n", FILE_APPEND);

        $view = new Views\View('error');
        $view->generate([
            'message' => $message
        ]);
    }
}
