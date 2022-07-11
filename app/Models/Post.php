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
            "SELECT t.* FROM tags t
            INNER JOIN post_tag pt ON pt.tag_id = t.id
            WHERE pt.post_id = ?",
            [$this->id]
        );
    }

    public function store(array $data, ?array $relations = null)
    {
        parent::store($data);

        $lastInsertPostId = parent::all()[0]->id;
        
        foreach ($relations as $tagId) {
            $statement = $this->db->getPDO()->prepare("INSERT INTO post_tag(post_id, tag_id) VALUES(?, ?)");
            $statement->execute([$lastInsertPostId, $tagId]);
        }

        return true;
    }

    public function update(int $id, array $data, ?array $relations = null)
    {
        parent::update($id, $data);

        $statement = $this->db->getPDO()->prepare("DELETE FROM post_tag WHERE post_id = ?");
        $result = $statement->execute([$id]);

        foreach ($relations as $tagId) {
            $statement = $this->db->getPDO()->prepare("INSERT INTO post_tag(post_id, tag_id) VALUES(?, ?)");
            $statement->execute([$id, $tagId]);
        }

        if ($result) {
            return true;
        }
    }
}
