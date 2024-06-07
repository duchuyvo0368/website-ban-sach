<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UpcomingProduct extends Model
{
    public $timestamps = false; //set time to false
    protected $fillable = [
        'product_name', 'product_image', 'product_date','product_status'
    ];
    protected $primaryKey = 'product_id';
    protected $table = 'table_upcoming_product';
}
