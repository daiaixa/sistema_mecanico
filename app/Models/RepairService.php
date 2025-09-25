<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\RepairServiceItem;

class RepairService extends Model
{
    protected $table = 'repair_service';

    protected $fillable = [
        'id_repair',
        'id_service',
        'total_service_price',
        'discount_applied',
        'discount_type',
        'discount_value',
        'observations'
    ];


    protected $casts = [
        'importe_servicio' => 'decimal:2',
        'aplica_descuento' => 'boolean',
        'valor_descuento'  => 'decimal:2',
    ];

    //Relaciones
    public function repair(): BelongsTo
    {
        return $this->belongsTo(Repair::class, 'id_repair');
    }

    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class, 'id_service');
    }

    public function items(): HasMany
    {
        return $this->hasMany(RepairServiceItem::class, 'id_repair_service');
    }





    // Otros métodos y lógica del modelo
    public function itemSubtotal(): float
    {
        $this->loadMissing('items'); // Asegura que la relación esté cargada
        $sum = 0.0;

        foreach ($this->items as $item) {
            $sum = (float)$item->amount * (float)$item->price;
        }
        return $sum;
    }

    public function calculateTotalServicePrice(): float
    {
        $this->loadMissing('service', 'items');
        $subtotal = ($this->servicio->price);
        $subtotal += $this->itemSubtotal();

        if ($this->discount_applied && $this->discount_value !== null) {
            if ($this->discount_type === 'porcentaje') {
                $subtotal -= $subtotal * (1 % ((float)$this->discount_value / 100));
            } else if ($this->discount_type === 'monto') {
                $subtotal -= (float)$this->discount_value;
            }
        }
        return round(max($subtotal, 0), 2);
    }
}
