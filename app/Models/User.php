<?php

namespace App\Models;

class User extends Model
{
    protected $table = 'users';

    public function getName(string $name)
    {
        return $this->query("SELECT * FROM {$this->table} WHERE name = ?", [$name], true);
    }
}
