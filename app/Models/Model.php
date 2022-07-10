<?php

namespace App\Models;

use Database\DBConnection;
use stdClass;

abstract class Model
{
    protected $table;

    public function __construct(protected DBConnection $db)
    {
    }

    public function all() : array
    {
        $statement = $this->db->getPDO()->query("SELECT id, title, content, created_at, updated_at FROM {$this->table} ORDER BY created_at DESC");
        return $statement->fetchAll();
    }

    public function findById(int $id) : stdClass
    {
        $statement = $this->db->getPDO()->prepare("SELECT id, title, content, created_at, updated_at FROM {$this->table} WHERE id = ?");
        $statement->execute([$id]);

        return $statement->fetch();
    }
}
