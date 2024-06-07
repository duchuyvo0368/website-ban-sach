<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    public $timestamps = false; //set time to false
    protected $fillable = [
        'order_code', 'product_id', 'product_name','product_price','product_sales_quantity','created_at'
    ];
    protected $primaryKey = 'order_details_id';
    protected $table = 'table_order_details';
}
