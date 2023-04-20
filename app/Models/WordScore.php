<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WordScore extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'word',
        'positive',
        'negative',
        'score',
        'provider'
    ];

    protected $casts = [
        'positive' => 'int',
        'negative' => 'int',
        'score'    => 'float',
    ];
}
