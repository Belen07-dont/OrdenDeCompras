<?php
// app/Models/Comment.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'message',
        'user_id',
    ];

   //llave foranea de Usuarios
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    //atributos de fecha de creacion
    public function getFechaAttribute()
    {
        return $this->created_at->format('d/m/Y H:i');
    }
}