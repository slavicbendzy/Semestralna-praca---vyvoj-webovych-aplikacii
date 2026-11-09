<?php

namespace App\Models;

use Framework\Core\Model;

class Message extends Model
{
    protected static ?string $tableName = 'messages';

    public ?int $id = null;
    public string $full_name = '';
    public string $email = '';
    public string $phone = '';
    public string $message = '';
    public string $created_at = '';
    public string $status = 'new';
}
