<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orders extends Model
{
    use HasFactory;

    protected $table = 'orders';
    protected $fillable = ['product'];

    /**
     * Get all of the comments for the orders
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function order_users()
    {
        return $this->hasOne(user_reqres::class, 'id', 'user_id');
    }
}
