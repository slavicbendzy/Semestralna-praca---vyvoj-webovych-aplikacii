<?php

namespace App\Models;

use Framework\Core\Model;

class Package extends Model
{
    protected static ?string $tableName = 'packages';

    public ?int $id = null;
    public string $name = '';
    public string $description = '';
    public float $price = 0;
    public int $max_guests = 0;
}
