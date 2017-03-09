<?php

function getDB() {
    return new PDO('mysql:host=localhost;dbname=tp_php_mvc;charset=utf8', 
          'root', 'ervbfd');
}

function getPosts() {
    $db = getDB();
    return $db->query('
        SELECT id, creation_date, title, content
        FROM posts
        ORDER BY creation_date DESC
    ');
}
