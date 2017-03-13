<?php
require_once 'models/Model.php';

class Post extends Model {
    public static function getAll() {
        $db = self::getDB();
        $statement = $db->query('
            SELECT id, creation_date, title, content
            FROM posts
            ORDER BY creation_date DESC
        ');
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getById(int $post_id) {
        $db = self::getDB();
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
}
