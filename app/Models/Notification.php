<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $fillable = ['egresado_id', 'title', 'message', 'read'];

    public function egresado()
    {
        return $this->belongsTo(Egresado::class);
    }
} 