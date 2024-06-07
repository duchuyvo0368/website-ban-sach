<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class Product extends Model
{
    public $timestamps = false; //set time to false
    protected $fillable = [
        'category_id','product_name','product_author', 'product_desc','product_price','product_number','product_image','product_status'
    ];
    protected $primaryKey = 'product_id';
    protected $table = 'table_product';
}
