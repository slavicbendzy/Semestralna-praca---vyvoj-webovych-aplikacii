<?php

namespace App\Models;

use Framework\Core\Model;

class PhotoAlbum extends Model
{
    protected static ?string $tableName = 'photo_albums';

    public ?int $id = null;
    public string $title = '';
    public string $description = '';
}
