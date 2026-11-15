<?php

namespace App\Models;

use Framework\Core\Model;

class ReservationService extends Model
{
    protected static ?string $tableName = 'reservation_services';

    public ?int $id = null;
    public int $reservation_id = 0;
    public string $name = '';
    public string $description = '';
    public float $price = 0;
}
