<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
    use HasFactory;

    protected $fillable = [
        'warehouse_name', 'warehouse_email', 'warehouse_phone', 'warehouse_country', 'warehouse_city', 'warehouse_address', 
            'warehouse_status', 'created_by'
    ];
}
