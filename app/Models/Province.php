<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Province extends Model
{
    protected $table = 'provinces';
    protected $fillable = ['name'];


    //Relaciones
    public function towns(): HasMany
    {
        return $this->hasMany(Town::class);
    }
}
