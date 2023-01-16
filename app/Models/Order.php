<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    use HasFactory;

    protected $table= 'order';
    protected $fillable =[
        'order_id',
        'unit_id',
        // 'bayar_id',
        'price',
        'qty',
        
    ];

    public function unitrumah(): BelongsTo
    {
        return $this->belongsTo(UnitRumah::class,'unit_id', 'id');
    }

    // public function untukbayar(): BelongsTo
    // {
    //     return $this->belongsTo(Bayar::class,'bayar_id', 'id');
    // }
}
