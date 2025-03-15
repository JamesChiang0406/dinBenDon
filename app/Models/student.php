<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class student extends Model
{
    public $timestamps = false;
    protected $table = "student";
    protected $primaryKey = "id";
    protected $fillable = [
        "id",
        "name",
        "account",
        "password",
        "studentNo",
        "role"
    ];

    public function getStudent($account, $password)
    {
        $student = self::where('account', $account)->where('password', $password)->first();
        return $student;
    }
}
