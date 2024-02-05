<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use mysql_xdevapi\Table;

class Delivery extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'delivery';
    protected $fillable = [
        'box_count',
        'receipt_date',
        'warehouse_id'
    ];

    public function warehouse(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Warehouse::class, 'id','warehouse_id');
    }
}
