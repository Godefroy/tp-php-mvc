<?php
namespace Blog\Models;

class Comment extends Model {
    public static function getByPostId(int $post_id) {
        return self::query('
            SELECT id, creation_date, author, content
            FROM comments
            WHERE post_id = ?
        ', [$post_id]);
    }
}
