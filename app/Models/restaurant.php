<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class restaurant extends Model
{
    public $timestamps = false;
    protected $table = "restaurant";
    protected $primaryKey = "id";
    protected $fillable = [
        "id",
        "restaurantName",
        "website",
        "description",
        "phone",
        "restaurantPic"
    ];

    public function choosedList()
    {
        return $this->hasMany('App\Models\choosedList');
    }
}
