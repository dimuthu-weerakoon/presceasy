<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // protected $table = 'products';

    protected $primaryKey = 'id';

    // protected $timestamps = true;

    protected $fillable = [
        'category', 'product', 'quantity','user_id',
    ];


    public function user()
    {
       return $this->belongsTo('App\User');
    }



}
