<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Customer extends Model
{
    protected $table = 'customers';
    protected $fillable = [
        'name',
        'surname',
        'document_number',
        'phone',
        'phone2',
        'email',
        'town_id',
        'observations',
        'debtor',
    ];

    //Relaciones
    public function town(): BelongsTo
    {
        return $this->belongsTo(Town::class);
    }
}
