<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use PhpParser\Node\Expr\FuncCall;

class Vehicle extends Model
{
    protected $table = 'vehicles';
    protected $fillable = [
        'customer_id',
        'patent',
        'brand',
        'model',
        'kilometers_init',
        'kilometers_current',
        'observations'
    ];

    //Relaciones 
    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }

    public function repairs(): HasMany
    {
        return $this->hasMany(RepairService::class);
    }
}
