<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = ['total', 'user_id', 'status_id','paid_way','order_no','paid_id','image'];

    public function status()
    {
        return $this->belongsTo(Statu::class);
    }

    public function paid()
    {
        return $this->belongsTo(PaidWey::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function orderProducts()
    {
        return $this->hasMany(OrderProduct::class);
    }
 
}
