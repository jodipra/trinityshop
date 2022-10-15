<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    use HasFactory;
    protected $table = 'wishlists';
    protected $fillabel = [
        'user_id',
        'unit_id',
    ];

    public function unitrumah()
    {
        return $this->belongsTo(UnitRumah::class,'unit_id','id');
    }
}
