<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Enums\GemTransactionTagEnum;

class GemTransaction extends Model
{
    use HasFactory;

    protected $cast = [
        'tag' => GemTransactionTagEnum::class,
    ];

    public function gem() {
        $this->belongsTo(Gem::class, 'gem_id');
    }

    public function user() {
        $this->belongsTo(User::class, 'user_id');
    }
}
