<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wallet extends Model 
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'value', 'created_at', 'updated_at'
    ];

    protected $hidden = [
        
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}