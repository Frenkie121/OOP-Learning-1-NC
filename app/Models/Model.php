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

    public function destroy(int $id)
    {
        return $this->query("DELETE FROM {$this->table} WHERE id = ?", $id);
    }

    public function query(string $query, int $param = null, bool $single = null)
    {
        $method = is_null($param) ? 'query' : 'prepare';

        $statement = $this->db->getPDO()->$method($query);
        $statement->setFetchMode(PDO::FETCH_CLASS, get_class($this), [$this->db]);

        if (strpos($query, 'DELETE') === 0 || strpos($query, 'CREATE') === 0 || strpos($query, 'UPDATE')) {
            return $statement->execute([$param]);
        }

        $fetch = is_null($single) ? 'fetchAll' : 'fetch';

        if ($method === 'query') {
            return $statement->$fetch();
        } else {
            $statement->execute([$param]);
            return $statement->$fetch();
        }
    }
}
