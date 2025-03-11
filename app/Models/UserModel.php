<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    protected $table = "users";
    protected $primaryKey ="id";
    protected $fillable = ['id','name', 'username', 'username_verified_at', 'password', 'role'];
}
