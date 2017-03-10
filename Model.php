<?php
require_once 'NotFoundException.php';

function getDB() {
    return new PDO('mysql:host=localhost;dbname=tp_php_mvc;charset=utf8', 'root', 'ervbfd');
}

function getPosts() {
    $db = getDB();
    $statement = $db->query('
        SELECT id, creation_date, title, content
        FROM posts
        ORDER BY creation_date DESC
    ');
    return $statement->fetchAll(PDO::FETCH_ASSOC);
}

function getPost(int $post_id) {
    $db = getDB();
    $statement = $db->prepare('
        SELECT id, creation_date, title, content
        FROM posts
        WHERE id = ?
    ');
    $statement->execute([$post_id]);
    if ($statement->rowCount() === 1) {
        return $statement->fetch(PDO::FETCH_ASSOC);
    } else {
        throw new NotFoundException('Post not found');
    }
}

function getComments(int $post_id) {
    $db = getDB();
    $statement = $db->prepare('
        SELECT id, creation_date, author, content
        FROM comments
        WHERE post_id = ?
    ');
    $statement->execute([$post_id]);
    return $statement->fetchAll(PDO::FETCH_ASSOC);
}
