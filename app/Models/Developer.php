<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Developer extends Model
{
    use HasFactory;

    protected $fillable = [
        'isim',
        'sure',
        'zorluk',
        'load'
    ];

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
}
