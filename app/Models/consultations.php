<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class consultations extends Model
{
    use HasFactory;
    protected $table = 'consultations';
    protected $guarded = [];
    public $timestamps = false;
}
