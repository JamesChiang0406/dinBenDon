<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class choosedList extends Model
{
    public $timestamps = false;
    protected $table = "choosedlist";
    protected $primaryKey = "id";
    protected $fillable = [
        "id",
        "studentId",
        "restaurantId"
    ];

    public function hasList($userId)
    {
        $list = self::where("studentId", $userId)->get();
        return $list;
    }

    public function student()
    {
        return $this->belongsTo('App\Models\student', 'studentId');
    }

    public function restaurant()
    {
        return $this->belongsTo('App\Models\restaurant', 'restaurantId');
    }
}
