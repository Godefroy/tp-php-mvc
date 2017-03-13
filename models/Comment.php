<?php
require_once 'models/Model.php';

class Comment extends Model {
    public static function getByPostId(int $post_id) {
        $db = self::getDB();
        $statement = $db->prepare('
            SELECT id, creation_date, author, content
            FROM comments
            WHERE post_id = ?
        ');
        $statement->execute([$post_id]);
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
}
