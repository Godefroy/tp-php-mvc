<?php

function controllerHome() {
    $posts = getPosts();
    require 'views/home.php';
}

function controllerPost(int $id) {
    $post = getPost($id);
    $comments = getComments($id);
    require 'views/post.php';
}

function controllerError(Exception $e) {
    file_put_contents('errors.log', date('c') . ' - ' . $e->getMessage() . "\n", FILE_APPEND);
    $errorMessage = $e->getMessage();
    require 'views/error.php';
}
