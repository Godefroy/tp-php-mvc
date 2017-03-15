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

    public static function create($post_id, $author, $content) {
        $author = trim($author);
        $content = trim($content);

        // Validation
        if (!preg_match('#^[^\n\t<>]{3,30}$#', $author)) {
            throw new \Blog\Exceptions\ValidationException('AUTHOR');
        }
        if ($content === '') {
            throw new \Blog\Exceptions\ValidationException('CONTENT');
        }

        self::execute('
            INSERT INTO comments
            (post_id, author, content, creation_date)
            VALUES (:post_id, :author, :content, :creation_date)
        ', [
            'post_id' => $post_id,
            'author' => $author,
            'content' => $content,
            'creation_date' => date('c')
        ]);
    }
}
