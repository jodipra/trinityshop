<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListPerumahan extends Model
{
    use HasFactory;

    protected $table = 'listperumahan';
    protected $fillable = [
        'name',
        'slug',
        'alamat',
        'description',
        'status',
        'image' ,
        'meta_title',
        'meta_descrip',
        'meta_keywords',

    ];
}
