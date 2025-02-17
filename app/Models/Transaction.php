<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'sender_id',
        'receiver_id',
        'type',
        'amount',
        'confirmed'
    ];

    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id');
    }

    // Relasi ke user sebagai penerima
    public function receiver()
    {
        return $this->belongsTo(User::class, 'receiver_id');
    }
}
