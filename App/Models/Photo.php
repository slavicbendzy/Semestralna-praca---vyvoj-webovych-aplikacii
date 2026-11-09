<?php

namespace App\Models;

use Framework\Core\Model;

class Photo extends Model
{
    protected static ?string $tableName = 'photos';

    public ?int $id = null;
    public int $album_id = 0;
    public string $title = '';
    public string $description = '';
    public string $file_path = '';
    public int $position = 0;
}
