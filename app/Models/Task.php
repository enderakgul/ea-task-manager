<?php

namespace App\Models;

use App\Observers\TaskObserve;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[ObservedBy([TaskObserve::class])]
class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'isim',
        'sure',
        'zorluk',
        'provider',
        'developer_id'
    ];

    public function developer()
    {
        return $this->belongsTo(Developer::class);
    }
}
