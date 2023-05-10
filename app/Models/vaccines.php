<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vaccines extends Model
{
    use HasFactory;
    protected $table = 'vaccines';
    protected $guarded = [];


    public function spots()
    {
        return $this->belongsToMany(spots::class, 'spot_vaccines', 'vaccine_id', 'spot_id', null, null, 'left join');
    }
}
