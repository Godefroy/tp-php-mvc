<?php

function controllerHome() {
    $posts = getPosts();
    require 'view_home.php';
}

function controllerPost(int $id) {
    $post = getPost($id);
    $comments = getComments($id);
    require 'view_post.php';
}

function controllerError(Exception $e) {
    file_put_contents('errors.log', date('c') . ' - ' . $e->getMessage() . "\n");
    $errorMessage = $e->getMessage();
    require 'view_error.php';
}
