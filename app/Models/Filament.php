<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Filament extends Model
{
    use HasFactory;

    protected $table = 'filaments';

    protected $fillable = [
        'id',
        'fil_type',
        'fil_cost'
    ];
}
