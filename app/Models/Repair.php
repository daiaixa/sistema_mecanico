<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Repair extends Model
{
    protected $table = 'repairs';
    protected $fillable = [
        'id_customer',
        'id_vehicle',
        'kilometers',
        'date_repair',
        'kilometers_next', //nulleable, proximo servis
        'pickup', //boolean
        'pickup_date',
        'total_amount', //monto total a abonar
        'observations',
    ];

    //Casts que convierten automaticamente los tipos de datos
    protected $casts = [
        'retiro'          => 'boolean',
        'fecha_reparacion' => 'datetime',
        'fecha_retiro'    => 'datetime',
        'monto'           => 'decimal:2',
    ];

    //Relaciones
    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }

    public function vehicle(): BelongsTo
    {
        return $this->belongsTo(Vehicle::class);
    }

    public function services(): HasMany
    {
        return $this->hasMany(RepairService::class, 'repair_id');
    }

    //Metodos
    //Un metodo que calcule el costo total de la reparacion sumando los costos de los servicios asociados
    public function calculateTotalAmount(): float
    {
        $this->loadMissing('servicios');
        $total = $this->servicios->sum(fn($renglonServicio) => (float)$renglonServicio->importe_servicio);
        return round($total, 2);
    }

    //Un metodo que actualice el monto total de la reparacion
    public function refreshTotalQuietly(): void
    {
        $this->monto = $this->calculateTotalAmount();
        $this->saveQuietly();
    }
}
