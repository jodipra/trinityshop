<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnitRumah extends Model
{
    use HasFactory;
    protected $table = 'unitrumah';
    protected $fillable = [
       'listrumah_id', 
       'name',
       'slug',
       'type',
       'lb',
       'lt',
       'description',
       'spesifikasi',
       'original_price',
       'selling_price',
       'utj_price',
       'image',
       'qty',
       'status',
       'meta_title',
       'meta_keywords',
       'meta_descrip',

    ];
    public function listperumahan()
    {
        return $this->belongsTo(ListPerumahan::class,'listrumah_id','id');
    }
}
