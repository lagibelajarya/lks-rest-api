<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class spots extends Model
{
    use HasFactory;
    protected $table = 'spots';
    protected $guarded = [];

    public function vaccines()
    {
        return $this->belongsToMany(vaccines::class, 'spot_vaccines', 'spot_id', 'vaccine_id');
    }

    public function vaccinations()
    {
        return $this->hasMany(vaccinations::class, 'spot_id', 'id');
    }
}
