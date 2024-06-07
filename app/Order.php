<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public $timestamps = false; //set time to false
    protected $fillable = [
        'customer_id', 'shipping_id', 'order_status','order_code','created_at'
    ];
    protected $primaryKey = 'order_id';
    protected $table = 'table_order';
}
