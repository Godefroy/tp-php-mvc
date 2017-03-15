<?php
namespace Blog\Controllers;
use Blog\Models;
use Blog\Views;

class Post {
    public static function get(int $id) {
        $post = Models\Post::getById($id);
        $comments = Models\Comment::getByPostId($id);

        $view = new Views\View('post');
        $view->generate([
            'post' => $post,
            'comments' => $comments
        ]);
    }

}
