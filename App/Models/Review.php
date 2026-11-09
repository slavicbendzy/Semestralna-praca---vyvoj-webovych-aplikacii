<?php

namespace App\Models;

use Framework\Core\Model;

class Review extends Model
{
    protected static ?string $tableName = 'reviews';

    public ?int $id = null;
    public string $author_name = '';
    public int $rating = 5;
    public string $comment = '';
    public string $review_date = '';
}
