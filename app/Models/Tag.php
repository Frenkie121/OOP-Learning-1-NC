<?php

namespace App\Models;

class Tag extends Model
{
    protected $table = 'tags';

    public function getPosts()
    {
        return $this->query(
            "SELECT * FROM posts p
            INNER JOIN post_tag pt ON pt.tag_id = t.id
            INNER JOIN posts p ON pt.post_id = p.id
            WHERE t.id = ?",
            $this->id
        );
    }
}
