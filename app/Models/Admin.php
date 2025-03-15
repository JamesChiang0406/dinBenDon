<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    public $timestamps = false;
    protected $table = "admin";
    protected $primaryKey = "id";
    protected $fillable = [
        "id",
        "account",
        "password",
        "role"
    ];

    public function getAdmin($account, $password)
    {
        $admin = self::where('account', $account)->where('password', $password)->first();
        return $admin;
    }
}
