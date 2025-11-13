<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';

    protected $fillable = [
        'game_id',
        'customer_name',
        'contact',
        'details',
        'status',
    ];

    // Relasi ke Game
    public function game()
    {
        return $this->belongsTo(Game::class);
    }
}
