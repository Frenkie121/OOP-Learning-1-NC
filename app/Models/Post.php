<?php

namespace App\Models;

use DateTime;

class Post extends Model
{
    protected $table = 'posts';

    public function getCreatedAt(): string
    {
        return (new DateTime($this->created_at))->format('d M Y \a\t\ H:i');
    }

    public function getReducedContent(): string
    {
        return strlen($this->content) > 200 ? substr($this->content, 0, 200) . '...' : $this->content;
    }

    public function getButton(): string
    {
        return <<<TAG
        <a href="/posts/$this->id" class="btn btn-primary">Read more</a>
TAG;
    }

    public function getTags()
    {
        return $this->query(
            "SELECT name FROM tags t
            INNER JOIN post_tag pt ON pt.tag_id = t.id
            INNER JOIN posts p ON pt.post_id = p.id
            WHERE p.id = ?",
            $this->id
        );
    }
}
