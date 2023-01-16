<?php

namespace App\Models;

use App\Models\Order;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class bayar extends Model
{
    use HasFactory;

    protected $table= 'bayar';
    protected $fillable =[
        'user_id',
        'name',
        'lname',
        'email',
        'phone',
        'alamat',
        'kota',
        'provinsi',
        // 'negara',
        'kodepos',
        'total_price',
        'buktipembayaran',
        'payment_mode',
        'payment_id',
        'status',
        'message',
        'tracking_no',
    ];

    public function order()
    {
        return $this->hasMany(Order::class, 'order_id', 'id');
    }
}
