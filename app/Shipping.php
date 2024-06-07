<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    public $timestamps = false; //set time to false
    protected $fillable = [
        'shipping_name', 'shipping_address', 'shipping_phone','shipping_email','shipping_notes','shipping_method'
    ];
    protected $primaryKey = 'shipping_id';
    protected $table = 'table_shipping';
}
