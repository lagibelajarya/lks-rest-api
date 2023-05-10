<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class societies extends Model
{
    use HasFactory;
    protected $table = 'societies';
    protected $guarded = [];
    public $timestamps = false;


    public function regionals()
    {
        return $this->belongsTo(regionals::class, 'regional_id', 'id');
    }
}
