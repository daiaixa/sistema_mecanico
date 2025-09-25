<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RepairServiceItem extends Model
{
    protected $table = 'repair_service_item';

    protected $fillable = [
        'id_repair_service',
        'id_product',
        'amount',
        'observations'
    ];

    //Relaciones
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'id_product');
    }

    public function repairService(): BelongsTo
    {
        return $this->belongsTo(RepairService::class, 'id_repair_service');
    }

    //Metodos 


}
