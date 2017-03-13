<?php
use Blog\Models;

function controllerHome() {
    $posts = Models\Post::getAll();
    require 'views/home.php';
}

function controllerPost(int $id) {
    $post = Models\Post::getById($id);
    $comments = Models\Comment::getByPostId($id);
    require 'views/post.php';
}

function controllerError(Exception $e) {
    file_put_contents('errors.log', date('c') . ' - ' . $e->getMessage() . "\n", FILE_APPEND);
    $errorMessage = $e->getMessage();
    require 'views/error.php';
}
