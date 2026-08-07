<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;


#[Fillable([
    'user_id',
    'title',
    'description',
    'is_done',
])]
class Task extends Model
{
    use HasFactory; 
    
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}