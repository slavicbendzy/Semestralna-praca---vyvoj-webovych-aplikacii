<?php

namespace App\Models;

use Framework\Core\Model;

class Reservation extends Model
{
    protected static ?string $tableName = 'reservations';

    public ?int $id = null;
    public string $customer_name = '';
    public string $email = '';
    public string $event_date = '';
    public int $guest_count = 0;
    public string $package_name = '';
}
