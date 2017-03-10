<?php
require 'Model.php';

try {
    if (!isset($_GET['id']) || !ctype_digit($_GET['id'])) {
        throw new NotFoundException('Post not found');
    }

    $id = (int) $_GET['id'];
    $post = getPost($id);
    $comments = getComments($id);
    require 'view_post.php';

} catch (Exception $e) {
    $errorMessage = $e->getMessage();
    require 'view_error.php';
}
