<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kondisi extends Model
{
    use HasFactory;

    protected $table = 'kondisi';

    protected $fillable = ['kondisi', 'ket'];

    public $timestamps = true;
}
