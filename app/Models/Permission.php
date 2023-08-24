<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Permission extends Model
{
    use HasFactory;

    protected $fillable = [
        'group_id',
        'permission'
    ];

    public function group(): HasOne
    {
        return $this->hasOne(Group::class);
    }
}
