<?php

namespace App\Models;

use Framework\Core\Model;

class User extends Model
{
    protected static ?string $tableName = 'users';

    public ?int $id = null;
    public string $full_name = '';
    public string $nickname = '';
    public string $email = '';
    public string $phone = '';
    public string $role = 'customer';
}
