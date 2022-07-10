<?php

namespace App\Models;

use Database\DBConnection;
use PDO;

abstract class Model
{
    protected $table;

    public function __construct(protected DBConnection $db)
    {
    }

    public function all(): array
    {
        return $this->query("SELECT * FROM {$this->table} ORDER BY created_at DESC");
    }

    public function findById(int $id): Model
    {
        return $this->query("SELECT * FROM {$this->table} WHERE id = ?", $id, true);
    }

    public function query(string $query, int $param = null, bool $single = null)
    {
        $method = is_null($param) ? 'query' : 'prepare';
        $fetch = is_null($single) ? 'fetchAll' : 'fetch';

        $statement = $this->db->getPDO()->$method($query);
        $statement->setFetchMode(PDO::FETCH_CLASS, get_class($this), [$this->db]);

        if ($method === 'query') {
            return $statement->$fetch();
        } else {
            $statement->execute([$param]);
            return $statement->$fetch();
        }
    }
}
