<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'item_name', 'item_description', 'item_price', 'item_brand', 'item_quantity', 'item_status', 'item_type',
            'warehouse_id', 'created_by'
    ];
}
