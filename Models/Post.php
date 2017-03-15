<?php
namespace Blog\Models;

class Post extends Model {
    public static function getAll() {
        return self::query('
            SELECT id, creation_date, title, content
            FROM posts
            ORDER BY creation_date DESC
        ');
    }

    public static function getById(int $post_id) {
        $posts = self::query('
            SELECT id, creation_date, title, content
            FROM posts
            WHERE id = ?
        ', [$post_id]);
        if (!isset($posts[0])) {
            throw new \Blog\Exceptions\NotFoundException('Post not found');
        }
        return $posts[0];
    }
}
