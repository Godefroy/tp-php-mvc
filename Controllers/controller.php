<?php
use Blog\Models;
use Blog\Views;

function controllerHome() {
    $posts = Models\Post::getAll();

    $view = new Views\View('home');
    $view->generate([
        'posts' => $posts
    ]);
}

function controllerPost(int $id) {
    $post = Models\Post::getById($id);
    $comments = Models\Comment::getByPostId($id);

    $view = new Views\View('post');
    $view->generate([
        'post' => $post,
        'comments' => $comments
    ]);
}

function controllerError(Exception $e) {
    // Log
    file_put_contents('errors.log', date('c') . ' - ' . $e->getMessage() . "\n", FILE_APPEND);

    $view = new Views\View('error');
    $view->generate([
        'message' => $e->getMessage()
    ]);
}
