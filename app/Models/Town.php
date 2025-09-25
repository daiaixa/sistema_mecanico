<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Town extends Model
{
    protected $fillable = ['cod_postal', 'name', 'province_id'];
    protected $table = 'towns';

    //Relaciones
    public function province(): BelongsTo
    {
        return $this->belongsTo(Province::class);
    }
}
