<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $fillable = [
        'name'
    ];

    public  function  Product()
    {
        return $this->hasMany(Product::class);
    }

    public  function  User()
    {
        return $this->belongsTo(User::class);
    }
}
