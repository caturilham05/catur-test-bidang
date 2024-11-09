<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user_reqres extends Model
{
    use HasFactory;

    protected $table = 'user_reqres';
    protected $fillable = ['reqres_id', 'email', 'first_name', 'last_name', 'avatar', 'ecnrypted_data'];
}
