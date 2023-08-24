<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Membership extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'group_id'
    ];

    public function user(): HasOne
    {
        return $this->hasOne(User::class);
    }

    public function group(): HasOne
    {
        return $this->hasOne(Group::class);
    }
}
