<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tbl_wishlist extends Model
{
    protected $table = 'tbl_wishlist';
    protected $primaryKey = 'wishlist_id';
    protected $fillable = [
        'wishlist_product_id',
        'wishlist_user_id'
    ];
}
