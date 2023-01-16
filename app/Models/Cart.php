<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $table = 'carts';
    protected $fillable = [
        'user_id',
        'unit_id',
        'unit_qty',
    ];

    public function unitrumah()
    {
        return $this->belongsTo(UnitRumah::class,'unit_id','id');
    }
}
