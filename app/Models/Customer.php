<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];

    protected $casts = [
        'last_contacted' => 'datetime',
    ];

    public function format()
    {
        return [
            'customer_id' => $this->id,
            'name' => $this->name,
            'is_active' => $this->is_active,
            'author' => $this->user->email,
            'last_contacted' => $this->last_contacted->diffForHumans()
        ];
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function scopeActive($query) {
        return $query->where('is_active', '=', 1);
    }
}
